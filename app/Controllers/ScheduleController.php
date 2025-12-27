namespace App\Controllers;

use App\Models\JadwalPsikologModel;
use App\Models\PsikologModel;

class ScheduleController extends BaseController
{
    public function index($id_psikolog)
    {
        $psikologModel = new PsikologModel();
        $jadwalModel   = new JadwalPsikologModel();

        $psikolog = $psikologModel->find($id_psikolog);

        $jadwal = $jadwalModel->getAvailabilityByPsikolog($id_psikolog);

        // 🔹 format untuk JS
        $availability = [];
        foreach ($jadwal as $j) {
            $availability[$j['tanggal']][] = [
                'id_jadwal' => $j['id_jadwal'],
                'jam' => $j['jam_mulai']
            ];
        }

        return view('pages/scheduleLoggedin', [
            'nama_psikolog' => $psikolog['nama'],
            'harga' => $psikolog['harga'],
            'layanan' => $psikolog['spesialisasi'],
            'availabilityData' => json_encode($availability),
            'id_psikolog' => $id_psikolog
        ]);
    }
}

