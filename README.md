## Catapult Code Challenge
Author: Paulo Goncalves
Date: 23/10/2018

## Project technology
Slimframework: https://www.slimframework.com

Libraries:
Poignant : https://packagist.org/packages/mossengine/poignant

## Running the project

* Run installation
```
composer install
```

* Run the server
```
cd api
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

A postman colletion is available to use to test the project