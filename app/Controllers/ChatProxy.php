<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ChatProxy extends Controller
{
    protected $helpers = ['url'];

    protected function chatbotUrl(): string
    {
        $url = getenv('CHATBOT_URL');
        return $url ? $url : 'http://127.0.0.1:8000';
    }

    protected function forward(string $path)
    {
        $target = rtrim($this->chatbotUrl(), '/') . '/' . ltrim($path, '/');

        $body = file_get_contents('php://input');
        $headers = [];
        foreach (getallheaders() as $k => $v) {
            // forward only necessary headers; avoid forwarding hop-by-hop headers
            if (strtolower($k) === 'host') continue;
            if (strtolower($k) === 'content-length') continue;
            $headers[] = $k . ': ' . $v;
        }
        $ch = curl_init($target);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($headers, ['Content-Type: application/json']));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // timeout small to avoid blocking too long
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE) ?: 500;
        if ($resp === false) {
            $err = curl_error($ch);
            curl_close($ch);
            return $this->response->setStatusCode(502)->setJSON(['error' => 'Bad Gateway', 'detail' => $err]);
        }
        curl_close($ch);

        // mirror response
        return $this->response->setStatusCode($code)->setBody($resp);
    }

    public function status()
    {
        return $this->forward('status');
    }

    public function chat()
    {
        return $this->forward('chat');
    }
}
