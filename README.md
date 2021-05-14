# Nginx PHP MySQL [![Build Status](https://travis-ci.org/nanoninja/docker-nginx-php-mysql.svg?branch=master)](https://travis-ci.org/nanoninja/docker-nginx-php-mysql) [![GitHub version](https://badge.fury.io/gh/nanoninja%2Fdocker-nginx-php-mysql.svg)](https://badge.fury.io/gh/nanoninja%2Fdocker-nginx-php-mysql)

Docker running Nginx, PHP-FPM, Composer, MySQL and PHPMyAdmin.

##How to run project locally:
```
Start docker desktop!
```
Go to project directory and press:
```
docker-compose up --build -d
```
To insert database go to http://localhost:8080 and use:
* "mysql" for Server
* "dev" for user name
* "dev" for password

After login use database_ini.sql for import database.

If everything goes well go here: http://localhost:8000



## Install prerequisites

All requisites should be available for your distribution. The most important are :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)

Go to composer.json and press install. You should see vendor folder.


This project use the following ports :

| Server     | Port |
|------------|------|
| MySQL      | 8989 |
| PHPMyAdmin | 8080 |
| Nginx      | 8000 |
| Nginx SSL  | 3000 |

___
## Project structure

In all classes define namespace start with App.

For example:

```
DEFINE:
namespace App\ExampleClass;
USE:
use App\ExampleClass\ExampleClass;
$example = new ExampleClass();
```

___

## Run the application

1. Open your favorite browser :

    * [http://localhost:8000](http://localhost:8000/)
    * [https://localhost:3000](https://localhost:3000/) ([HTTPS](#configure-nginx-with-ssl-certificates) not configured by default)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (username: dev, password: dev)
   

___