## Simple Api

It's simple API on Laravel 8

## Install

-   `git clone` this repo
-   `cd TaskLaravelApi`
-   `docker-compose up -d`
-   `docker-compose exec php php artisan migrate:fresh --seed`

### Available routes

| GET|HEAD | / | | Closure | web |
| GET|HEAD | api/offices | offices.index | App\Http\Controllers\API\OfficesController@index | api |
| POST | api/offices | offices.store | App\Http\Controllers\API\OfficesController@store | api |
| GET|HEAD | api/offices/{office} | offices.show | App\Http\Controllers\API\OfficesController@show | api |
| PUT|PATCH | api/offices/{office} | offices.update | App\Http\Controllers\API\OfficesController@update | api |
| DELETE | api/offices/{office} | offices.destroy | App\Http\Controllers\API\OfficesController@destroy | api |

## Task to do

-   Move _cache push_ to quene
-   Make unit and functional testing.
