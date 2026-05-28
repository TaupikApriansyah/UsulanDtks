REVISI WARGA INFO ONLY

Perubahan:
1. Menu Cek Informasi DTKS di navbar warga dihapus.
2. Form cek status warga dihapus dari tampilan publik.
3. URL lama /cek-status dan /cek-DTKS diarahkan ke bagian Informasi pada beranda.
4. Warga hanya melihat dan menunggu informasi resmi yang diterbitkan Kelurahan.
5. Login petugas tetap melalui /admin.
6. Alur internal tetap: RT input usulan, RW validasi, Kelurahan validasi dan menerbitkan informasi.
7. Alur admin dan validasi tidak diubah.

Setelah extract, jalankan:
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve

Akun default:
Kelurahan: kelurahan@dunguscariang.id / Kelurahan123
RW 01: rw01@dunguscariang.id / Rw01pass123
RT 01 RW 01: rt01rw01@dunguscariang.id / Rt01pass123
