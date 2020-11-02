## Simple Api

It's simple API on Laravel 8

## Install

-   `git clone` this repo
-   `cd TaskLaravelApi`
-   `docker-compose up -d`
-   `docker-compose exec php composer install`
-   `docker-compose exec php php artisan migrate:fresh --seed`

### Available routes

Base url `http://laravel.localhost/`

| request type | endpoint             | Description         |
| ------------ | -------------------- | ------------------- |
| GET          | api/offices          | Get all Offices     |
| POST         | api/offices          | Add Office          |
| GET          | api/offices/{office} | Get Office by ID    |
| PUT          | api/offices/{office} | Update Office by ID |
| DELETE       | api/offices/{office} | Delite Office bt ID |

## Task to do

-   Move _cache push_ to quene
-   Make unit and functional testing.
