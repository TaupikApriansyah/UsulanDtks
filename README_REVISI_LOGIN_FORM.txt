REVISI LOGIN FORM PETUGAS

Perubahan:
1. Halaman /admin memakai desain login baru sesuai referensi kode dari user.
2. Form tetap memakai route asli Laravel: POST /postlogin.
3. Field tetap aman untuk backend lama: name="email" dan name="password".
4. CSRF token tetap aktif.
5. Checkbox "Ingat saya" sudah terhubung ke Auth::attempt(..., remember).
6. Jika email/password salah, halaman login menampilkan pesan error.
7. Navbar warga tetap tidak menampilkan menu Login Petugas.
8. Role tetap hanya Kelurahan, RW, dan RT.

Akun default setelah migrate:fresh --seed:
- kelurahan@dunguscariang.id / Kelurahan123
- rw01@dunguscariang.id / Rw01pass123
- rt01rw01@dunguscariang.id / Rt01pass123

Jalankan:
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve

Login petugas:
http://127.0.0.1:8000/admin
