DIGITAL WALLET LATEST CLEAN PROJECT
===================================

PENTING:
1. Jangan dicampur dengan folder project lama digital-wallet-starter.
2. Extract ZIP ini ke folder baru, misalnya: D:\Download\digital-wallet-latest-project
3. Migration sudah dibersihkan:
   - Tidak ada duplicate create_wallets_table
   - Tidak ada duplicate phone/pin/role
   - Admin memakai kolom role = admin
   - Helper rupiah() hanya satu kali di app/Helpers/helpers.php

BACKEND LARAVEL
---------------
cd wallet-api
copy .env.example .env
composer install
php artisan key:generate

Buat database MySQL:
CREATE DATABASE digital_wallet;

Sesuaikan .env:
DB_DATABASE=digital_wallet
DB_USERNAME=root
DB_PASSWORD=

Jalankan:
php artisan migrate:fresh --seed
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8000

Admin URL:
http://127.0.0.1:8000/admin/login

Login:
Email    : admin@wallet.test
Password : password

FLUTTER
-------
flutter create wallet_app
Copy isi folder wallet-app dari ZIP ini ke project wallet_app yang baru dibuat.

cd wallet_app
flutter pub get
flutter run --dart-define=API_BASE_URL=http://10.0.2.2:8000/api

Untuk HP fisik, ganti 10.0.2.2 dengan IP laptop:
flutter run --dart-define=API_BASE_URL=http://192.168.1.10:8000/api
