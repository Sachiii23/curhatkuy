namespace App\Controllers;

use App\Models\JadwalPsikologModel;

class BookingController extends BaseController
{
    public function book()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');

        $jadwalModel = new JadwalPsikologModel();

        if ($jadwalModel->bookSlot($id_jadwal)) {
            return redirect()->to('/payment/success');
        }

        return redirect()->back()->with('error', 'Slot sudah dibooking');
    }
}

