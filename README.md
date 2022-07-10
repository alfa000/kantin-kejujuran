# Kantik Kejujuran
 Kantik Kejujuran merupakan web untuk kebutuhan seleksi Compfest SEA S14

## System Architecture
- Backend : Laravel 9
- Frontend : HTML, CSS, Javascript(Jquery)
- Database : Postgresql 11.5

## Setup Development
### Configuration
```bash
$ git clone git@gitlab.com:jdsteam/command-center-jawa-barat/comcen-app-survey-pelaporan-backend-mobile.git
$ composer install
$ cp .env.example .env
```

### Running Development Local Server
Clone repository
```bash
$ git clone git@gitlab.com:jdsteam/command-center-jawa-barat/comcen-app-survey-pelaporan-backend-mobile.git
```
Compoer install
```bash
$ composer install
```
Create database
```bash
$ create database kantin-kejujuran
```
copy file .env.example to .env
```bash
$ cp .env.example .env
```
Generate key
```bash
$ php artisan key:generate
```

Migration and seeding
```bash
$ php artisan migrate:fresh
```

Run on local server
```bash
$ php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
