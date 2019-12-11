BChat: Business chat application.
-
Install instructions:

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
