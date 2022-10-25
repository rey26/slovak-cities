
# ABOUT #

- the aim is to create a Laravel app that parses HTML from an external site and syncs the data in the DB
- Topic is listing slovak cities and towns of a specific region from this source [e-obce.sk](https://www.e-obce.sk/kraj/NR.html)

INSTALLATION

1. install composer dependencies `composer install`
1. copy .env.example to .env `cp .env.example .env`
1. to run containers use `./vendor/bin/sail up -d` (you should create an alias in .bashrc for further use)
1. generate encryption key `sail artisan key:generate`
1. change DB_HOST in .env to `DB_HOST=mysql`
1. run all table migrations using: `sail artisan migrate`
1. sync data with: `sail artisan data:import`
1. update GPS coordinates `sail artisan data:geocode`

TESTING

1. run migrations on testing database `sail artisan migrate --env=testing`
1. run tests `sail artisan test`

USAGE

1. visit homepage for settlements search [localhost](http://localhost)
1. to list cities visit [localhost/settlements](http://localhost/settlements)
1. to access detailed view of a city or town click on a row with city name

ISSUES

- There is a known issue with folder permission when using laravel sail
    1. enter root shell inside container `sail root-shell`
    1. move one directory up `cd ..`
    1. change owner of html folder `chown -R sail:sail html`
    1. check if the change was successful `ls -la`
    1. exit container `exit`

TODO

- save parent-children relationship between settlements (District and its settlements)
- create front-end UI
- create autocomplete search
- delete unused coat-of-arms images with cron
