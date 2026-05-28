README REVISI ALUR RT - RW - KELURAHAN

Alur aplikasi:
1. Warga hanya bisa membuka halaman publik dan cek status DTKS.
2. Login petugas tidak ditampilkan di navbar warga. Akses login petugas melalui /admin.
3. RT login dan mengisi data usulan.
4. RT mengirim usulan ke RW.
5. RW memvalidasi usulan. Jika setuju, data dikirim ke Kelurahan. Jika ditolak, data kembali ke RT sebagai draft.
6. Kelurahan melakukan validasi ulang.
7. Kelurahan mengirim informasi final agar warga bisa cek hasil melalui halaman Cek DTKS.

Role aplikasi:
1. Kelurahan
2. RW
3. RT

Akun default setelah menjalankan migrate:fresh --seed:
1. Kelurahan: kelurahan@dunguscariang.id | Kelurahan123
2. RW 01: rw01@dunguscariang.id | Rw01pass123
3. RT 01 RW 01: rt01rw01@dunguscariang.id | Rt01pass123

Perintah awal:
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve

Catatan revisi terbaru:
1. Role superadmin dihapus. Kelurahan menjadi pengelola user, informasi, DTKS, export, dan validasi akhir.
2. Bug Method Illuminate\Database\Eloquent\Collection::links does not exist pada halaman Informasi diperbaiki dengan pagination.
3. Login petugas tetap tersedia di /admin, tetapi tidak muncul di navbar warga.
4. Akses fitur dibatasi ke tiga role: kelurahan, rw, dan rt.
