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

<img width="1920" height="1051" alt="Cmder 10_11_2026 8_00_29 AM" src="https://github.com/user-attachments/assets/be5bca96-3f60-4407-b37f-e543148c317b" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 8_00_35 AM" src="https://github.com/user-attachments/assets/8a3179d6-ff8f-4412-8b67-8783233f87e0" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 8_00_45 AM" src="https://github.com/user-attachments/assets/3750f8b9-cbc6-44c8-82db-d6967019af06" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 8_00_09 AM" src="https://github.com/user-attachments/assets/729126ed-3494-4643-b7a9-c6ca9a722bd8" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 8_00_02 AM" src="https://github.com/user-attachments/assets/bb316b07-9110-47e6-9e20-83f02c0dd2ee" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 7_59_54 AM" src="https://github.com/user-attachments/assets/8b450c95-2370-4d9b-849c-6cf6b8555c1a" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 7_59_47 AM" src="https://github.com/user-attachments/assets/c498744a-c70a-4642-be2e-35b85c2231c6" />

<img width="1920" height="1051" alt="Cmder 10_11_2026 7_58_59 AM" src="https://github.com/user-attachments/assets/e8597c7f-1675-495a-b5ae-38d3cac67cc4" />



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
