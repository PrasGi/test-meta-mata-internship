## Instalation

Untuk menginstall aplikasi ini memerlukan 2 aplikasi, yaitu vs code dan laragon

-   clone aplikasi ini
-   buka laragon lalu buat database baru untuk nama bebas
-   lalu copy file .env copy, dan rename menjadi .env
-   setelah itu buka file .env dan di DB_DATABASE ubah menjadi nama databse yang baru di buat
-   lalu tambahkan FILESYSTEM_DISK=public di env paling bawah
-   nyalakan server laragon

### lalu ketik di terminal vs code

-   composer install
-   php artisan key:generate
-   php artisan migrate:fresh --seed
-   php artisan storage:link

### kemudian untuk menyalakan server

-   php artisan serve

## Akun

-   Email : user1@gmail.com
-   password : password
-   Email : user2@gmail.com
-   password : password
