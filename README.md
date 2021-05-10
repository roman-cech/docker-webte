# Nginx PHP MySQL [![Build Status](https://travis-ci.org/nanoninja/docker-nginx-php-mysql.svg?branch=master)](https://travis-ci.org/nanoninja/docker-nginx-php-mysql) [![GitHub version](https://badge.fury.io/gh/nanoninja%2Fdocker-nginx-php-mysql.svg)](https://badge.fury.io/gh/nanoninja%2Fdocker-nginx-php-mysql)

Docker running Nginx, PHP-FPM, Composer, MySQL and PHPMyAdmin.


## Install prerequisites

All requisites should be available for your distribution. The most important are :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)

Go to composer.json and press install. You should see vendor folder.

To run the docker container use commad bellow:

```
docker-compose up --build -d
```

To stop the docker container use commad bellow:

```
docker-compose down
```

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
### Project tree

```sh
.
├── Makefile
├── README.md
├── data
│   └── db
│       └── mysql
├── docker-compose.yml
├── etc
│   ├── nginx
│   │   ├── default.conf
│   │   └── default.template.conf
│   ├── php
│        └── php.ini
└── web
    ├── app
    │   ├── composer.json
    │   ├── composer.lock
    │   ├── phpunit.xml.dist
    │   ├── src
    │   │   └── controller
    │   │          └── Controller.php
    │   │   └── model
    │   │          └── Model.php
    │   │   └── view
    │   │        └── footer.blade.php
    │   │        └── navigator.blade.php
    │   ├── vendor
    └── public
        └── assets
          └── css
            └── style.php
          └── image
          └── js
            └── script.php
        └── index.php
```
___

## Run the application

1. Open your favorite browser :

    * [http://localhost:8000](http://localhost:8000/)
    * [https://localhost:3000](https://localhost:3000/) ([HTTPS](#configure-nginx-with-ssl-certificates) not configured by default)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (username: dev, password: dev)
   

___