## Catapult Code Challenge
Author: Paulo Goncalves
Date: 23/10/2018

## Project technology

PHP Slimframework: https://www.slimframework.com
Docker: https://www.docker.com/
Composer: https://getcomposer.org/

* Libraries:
Poignant : https://packagist.org/packages/mossengine/poignant
PHPUnit: https://github.com/sebastianbergmann/phpunit

## Running the project

You Must have the following installed to have this project running:
- Composer
- Docker

A few things to consider:
- Make sure that port 3306 and 80 is not in use, or, change them as you wish on Dockerfile.
- Make sure you are on the project directory: `cd api`
- Depending on the internet speed, you might have a timeout running the commands bellow.

* Run all setup in one:
```
composer run setup
```

`OR`

* Run installation
```
composer install
```

* Run the server
```
docker-compose up
```
Option: If you want to change the port other than 8001, change docker-composer.yml 

* Run migration
```
vendor/bin/phinx migrate
```

* Run seeder
```
vendor/bin/phinx seed:run
```

## Endpoints

There are 2 open endpoints, 1 is to ping the server to test the reachability and the other is to get the authorized token to communicate with the api.

To make things simple, there is no user/password check in place.

Please visit the http://localhost to view all availables endpoints.


## Postman

A postman colletion and environment is available to use to test the project

## Unit Test

Execulte the command to run the test:
```
composer run test
```