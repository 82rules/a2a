Movie Project setup

This is a standard Laravel + Livewire setup, so running it is standard steps

Clone repo
npm install
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate && php artisan db:seed 
[tab 1] npm run dev [tab 2] php artisan serve 

