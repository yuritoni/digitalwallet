# Digital Wallet Clean Starter

Project ulang yang bersih: Laravel 9 API + Web Admin, kompatibel PHP 8.0.3, dan Flutter Android/iOS starter.

## Backend Laravel

```bash
cd wallet-api
cp .env.example .env
composer install
php artisan key:generate
```

Buat database `digital_wallet`, lalu set `.env`.

```bash
php artisan migrate --seed
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8000
```

Admin:

- URL: `http://127.0.0.1:8000/admin/login`
- Email: `admin@wallet.test`
- Password: `password`

API Flutter:

- `POST /api/register`
- `POST /api/login`
- `GET /api/wallet`
- `POST /api/topup`
- `POST /api/transfer`
- `GET /api/transactions`

## Catatan penting

Project ini tidak memakai `Auth::routes()` dan tidak memakai `/home` bawaan Laravel. `/home` langsung redirect ke `/admin/dashboard`.
Function `rupiah()` hanya ada satu kali di `app/Helpers/helpers.php`.
