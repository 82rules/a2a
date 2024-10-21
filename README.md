Movie Project setup

This is a standard Laravel + Livewire setup, so running it is standard steps

To setup, clone repo and run these steps

npm install

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate && php artisan db:seed 

[tab 1] npm run dev [tab 2] php artisan serve 


To run the NPM interface, go to the root directory and run
npm MovieBox.js 


Note the NPM runs on the same sqlite instance as the laravel app, so migrations/seeding need to happen on laravel. 
