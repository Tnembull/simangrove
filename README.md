# Laravel 12 - User & Role Management

**Sistem Manajemen Pengguna dan Role berbasis Laravel 12 + SB Admin 2**, dilengkapi fitur lengkap untuk CRUD pengguna, reset password, pengaturan role & permission, serta tampilan admin yang responsif.

## Fitur Utama

✅ CRUD Pengguna (Tambah, Edit, Hapus)  
✅ Reset Password dengan toggle lihat/sembunyikan  
✅ Status Pengguna (Aktif/Nonaktif & Online/Offline)  
✅ CRUD Role  
✅ Assign/Unassign Permission ke Role  
✅ Lihat Daftar Pengguna per Role  
✅ UI Modal (Bootstrap Modal)  
✅ Integrasi DataTables  
✅ Spatie Laravel Permission  
✅ Laravel EasyNav untuk pengelolaan sidebar/menu  
✅ Laravel UI dengan Auth (Blade)

## Tech Stack & Paket Pendukung

| Komponen                    | Versi / Keterangan                           |
| --------------------------- | -------------------------------------------- |
| Laravel                     | ^12.3.0                                      |
| PHP                         | ^8.2                                         |
| Laravel UI (Auth Bootstrap) | ^4.0                                         |
| Spatie Laravel Permission   | ^6.18                                        |
| Laravel EasyNav             | ^1.0 (devmarketer/easynav)                   |
| DataTables                  | Versi CDN (jQuery + Bootstrap 4 Integration) |
| Mailer Support              | Symfony Mailgun / Postmark Mailer            |

## Development Packages

-   `spatie/laravel-ignition` – Debugging
-   `nunomaduro/collision` – CLI Error Rendering
-   `fakerphp/faker` – Dummy Data
-   `mockery/mockery` – Unit Test Mocks
-   `phpunit/phpunit` – Testing Framework

## ⚙️ Instalasi

```bash
git clone https://github.com/Tnembull/simangrove.git
cd simangrove
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Struktur Penting

```
├── app/
│   └── Http/Controllers/
│       ├── UserController.php
│       └── RoleController.php
├── resources/views/
│   ├── users/
│   │   ├── index.blade.php
│   │   └── form.blade.php
│   ├── roles/
│   │   ├── index.blade.php
│   │   └── form.blade.php
├── routes/
│   └── web.php
├── database/seeders/
│   └── PermissionSeeder.php
```

<!-- ## 📸 Tampilan Antarmuka

### Login
![Login](https://imgur.com/YjGp6Sbl.png)

### Dashboard
![Dashboard](https://imgur.com/CrmOfT5l.png)

### Manajemen Pengguna
![Users](https://i.imgur.com/DQ5Kf5W.png)

### Manajemen Role
![Roles](https://i.imgur.com/zcknTDw.png) -->

## 📄 Lisensi

Proyek ini dirilis dengan lisensi [MIT](LICENSE).  
Dikembangkan dengan ❤️ oleh Tnembull.
