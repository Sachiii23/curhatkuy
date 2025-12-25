
        function showDetails(method) {
    const detailsDiv = document.getElementById('payment-details');
    const contentDiv = document.getElementById('detail-content');
    
    detailsDiv.style.display = 'block'; // Tampilkan container utama
    
    let info = "";
    
    if (method === 'gopay') {
        info = `<h5>Instruksi GoPay</h5>
                <p>Silakan transfer ke nomor GoPay berikut: <strong>0812-3456-7890</strong><br>
                Atas Nama: <strong>Nama Toko Anda</strong></p>`;
    } else if (method === 'qris') {
        info = `<h5>Instruksi QRIS</h5>
                <p>Silakan scan kode QR di bawah ini melalui aplikasi pembayaran Anda:</p>
                <img src="link-gambar-qris-anda.png" style="width: 200px; margin-bottom: 10px;">`;
    } else if (method === 'ovo') {
        info = `<h5>Instruksi OVO</h5>
                <p>Silakan transfer ke nomor OVO berikut: <strong>0812-3456-7890</strong><br>
                Atas Nama: <strong>Nama Toko Anda</strong></p>`;
    }
    
    contentDiv.innerHTML = info;
}

    $(document).ready(function() {
        $('#paymentForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form redirect langsung
            
            // Logika: Biasanya di sini Anda melakukan AJAX submit.
            // Namun untuk simulasi pop-up sesuai gambar:
            
            $('#successModal').modal('show');
            
            // Opsi: Jika ingin submit form beneran setelah modal muncul, 
            // Anda bisa menggunakan AJAX atau redirect manual nanti.
        });
    });

$(document).ready(function() {
    $('#paymentForm').on('submit', function(e) {
        e.preventDefault(); // Menghentikan redirect halaman

        // Mengambil data form (termasuk file bukti pembayaran)
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'), // Otomatis mengambil '../payment/createPayment'
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                // Opsional: Beri loading pada tombol agar user tidak klik berkali-kali
                $('.btn-submit').text('Sedang Memproses...').prop('disabled', true);
            },
            success: function(response) {
                // MUNCULKAN MODAL SAAT DATA BERHASIL DISIMPAN
                $('#successModal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan, silakan coba lagi.');
                $('.btn-submit').text('Submit').prop('disabled', false);
            }
        });
    });
});
