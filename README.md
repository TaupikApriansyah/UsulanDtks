# Aplikasi Usulan DTKS Kelurahan Dunguscariang

## Alur Sistem

1. Warga membuka halaman publik untuk melihat informasi dan cek status DTKS.
2. Login petugas tidak tampil di navbar warga. Petugas login melalui `/admin`.
3. RT login dan mengisi data usulan warga.
4. RT mengirim usulan ke RW.
5. RW memvalidasi usulan.
6. Jika RW menyetujui, data masuk ke Kelurahan.
7. Jika RW menolak, data kembali ke RT sebagai draft dengan catatan.
8. Kelurahan melakukan validasi ulang.
9. Kelurahan mengirim informasi final.
10. Warga cek hasil akhir melalui halaman Cek DTKS memakai NIK dan No KK.

## Role

Aplikasi hanya memakai 3 role:

1. Kelurahan
2. RW
3. RT

Kelurahan mengelola user, informasi, data DTKS, export, dan validasi akhir.

## Akun Default

Jalankan `php artisan migrate:fresh --seed` dulu.

| Role | Email | Password |
|---|---|---|
| Kelurahan | kelurahan@dunguscariang.id | Kelurahan123 |
| RW 01 | rw01@dunguscariang.id | Rw01pass123 |
| RT 01 RW 01 | rt01rw01@dunguscariang.id | Rt01pass123 |

## Cara Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve
```

Buka halaman publik di `/`.

Buka login petugas di `/admin`.

## Revisi Terbaru

1. Role superadmin dihapus.
2. Akses manajemen user dipindahkan ke role Kelurahan.
3. Menu Informasi hanya untuk Kelurahan.
4. Bug `Collection::links()` pada halaman Informasi diperbaiki dengan `paginate(9)`.
5. Login petugas dihapus dari navbar warga.
6. Route petugas tetap aman di `/admin`.
