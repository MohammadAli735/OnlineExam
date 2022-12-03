## About Online Exam 

-  this is a simple project which i tried to make this system an SPA system
-  I have choosen laravel as backend and vue for forent for this project
-  Aloguth this system is simple i tried to make the backend code more reuse-able using services class
-  Also i have emplement all feature of vue js 3 composition api, for the next update i want to emplement laravel websocket and realtime intractions


## How up and run backend of this project

- to up and run this project first create database 
- create a new env file for laravel which is the backend of this project
- set the required env credentails correctly as flow 
- ** DB_CONNECTION="mysql" **
- ** DB_HOST=127.0.0.1 **
- ** DB_PORT=3306 **
- ** DB_DATABASE=databaseName **
- ** DB_USERNAME=databaseUsername **
- ** DB_PASSWORD=databasePassword **

- after seting the env file correctly migrate the migration and seed the database
- in laravel dir run php artisan serve
- ** please serve laravel 127.0.0.1:8000 ** case axiosClient to vue expose that url as base but if you serve at some other url please change base url of axiosClient which in vue/src/axios/index.js 

## How up and run front-end of this project
- open terminal or cmd inside vue dir which inside exam dir and run npm run dev
- and copy the url which is created by runing npm run dev
