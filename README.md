# BChat: A business chat application.

This app was made for my Information Systems course on Instituto Federal da Bahia, lectured by professor Ciro, on my senior year.
The given task was to implement and develop any REST based system, with SELECT, DELETE, UPDATE and INSERT queries on a SQL server, and develop the respective use cases diagram and its software requirements documentation. 

## Install instructions:

Duplicate `.env.example` file as `.env`;\
Match `APP_URL` to your app host URL;\
Add your DB server to `DB_CONNECTION`;\
Change `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` to your local settings.

Run these commands:\
`composer install`\
`npm install`\
`php artisan key:generate`\
`php artisan migrate`

`npm install -g laravel-echo-server`\
`laravel-echo-server init`\
`laravel-echo-server start`
