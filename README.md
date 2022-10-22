
# ABOUT #

- the aim is to create a Laravel app that parses HTML from an external site and syncs the data in the DB
- Topic is listing slovak cities and towns of a specific region from this source [e-obce.sk](https://www.e-obce.sk/kraj/NR.html)

INSTALLATION

1. to run containers use `./vendor/bin/sail up -d` (you should create an alias in .bashrc for further use)
1. run all table migrations using: `sail artisan migrate`
1. generate encryption key `sail artisan key:generate`
1. sync data with: `sail artisan data:import`

TESTING

1. run migrations on testing database `sail artisan migrate --env=testing`
1. run tests `sail artisan test`

USAGE

1. to list cities visit [localhost](http://localhost) in web browser
1. to access detailed view of a city or town click on a row with city name

TODO

- create front-end UI
- create autocomplete search
