Movie Project setup

Basically I wrote a laravel UX interface and a npm command line programmer for (2 languages)

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



Database schema explanation. 

Basically I normalized Movies, theatres, sales and showtimes to make them easier to query and aggregate. 
DB schemas are often reflective of real world object, I fee like this case was no exception. 

I added actors and roles in order to be able to further drill down into revenue by actor, role etc.. but left that out of analytics for now. 

I chose to do the UX because it was more indicative for a real world app, i left the node app relatively light in logic just to save on time. 
