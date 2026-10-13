# Tugas Rutin 11 — E-Commerce DB + Secure Auth

Project Laravel untuk memenuhi Tugas Rutin 11 dengan implementasi database e-commerce, authentication, multi-role authorization, middleware, policy, dan pengelolaan produk.

## Teknologi

- Laravel 10
- PHP 8.2
- MySQL
- Laravel Breeze
- Blade
- Tailwind CSS
- Filament Admin Panel + Shield (Bonus)

## Fitur

- 7 tabel database e-commerce (users, categories, products, orders, order_items, tags, product_tag)
- Migration dan Foreign Key
- Factory & Seeder (60+ produk realistis)
- Eloquent Model & Relationship
- Eloquent Scope (`scopePublished`, `scopeExpensive`)
- Login, Register, Logout (Laravel Breeze)
- Multi-role: Admin, Editor, User
- Custom Middleware (EnsureAdmin, EnsureRole)
- PostPolicy untuk otorisasi
- Proteksi Route (auth, admin, role:admin,editor)
- Filament Admin Panel (Bonus)
- Eager Loading untuk hindari N+1 query (Bonus)

## Akun Testing

| Role   | Email              | Password |
| ------ | ------------------ | -------- |
| Admin  | admin@test.com     | password |
| Editor | editor@test.com    | password |
| User   | user@test.com      | password |

Hak akses:

- **Admin:** lihat, edit, hapus semua produk & post
- **Editor:** lihat dan edit semua post
- **User:** hanya lihat, edit & hapus post miliknya sendiri

## Dokumentasi Tinker

Hasil 5 query Tinker untuk mendemonstrasikan relasi & scope:



## Menjalankan Project

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
Buat database ecommerce_db di phpMyAdmin, lalu atur .env:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=
Lanjut jalankan:

bash
php artisan migrate:fresh --seed
npm run build
php artisan serve
Buka browser:

text
http://127.0.0.1:8000
Struktur Folder
text
app/
├── Http/
│   ├── Controllers/PostController.php
│   └── Middleware/
│       ├── EnsureAdmin.php
│       └── EnsureRole.php
├── Models/
│   ├── Category.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Post.php
│   ├── Product.php
│   ├── Tag.php
│   └── User.php
└── Policies/PostPolicy.php

database/
├── factories/
├── migrations/
└── seeders/DatabaseSeeder.php

resources/views/
├── layouts/app.blade.php
├── components/
│   ├── alert.blade.php
│   └── card.blade.php
└── posts/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php
Repository
text
TugasWeb-P11-EcommerceAuth
