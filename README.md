
------------------

# Angular 1.7.2
# PHP >= 7.1.3
# Laravel 5.7
# Bootstrap 4.0.0
# psr-http-message-bridge v.1.1
# barryvdh/laravel-cors v.0.11.2


------------------

Steps to construct the architecture

1 - composer create-project laravel/laravel upcoming-movies — prefer-dist

2 - composer update

3 - php artisan key:generate

4 - Create a mysql database called movies

5 - Update dabatase infos in .env

6 - php artisan make:auth

7 - php artisan migrate

8 - composer require symfony/psr-http-message-bridge

9 - composer require barryvdh/laravel-cors 

10 - php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"

11 - php -S localhost:8000 -t public (RUN THE APPLICATION)

OBS 1: Steps 4 and 5 are used to create the authentication functionality.
OBS 2: The architecture approach used was not the best one, far from that, but the idea was construct a full application using just one project, so the backend I used Laravel and the frontend I used Angular.

Difficults: I started the project using the complete Laravel (MVC). It has php pages and the way that it render the page is different from Angular, so I had to change the php pages and used the Laravel just to create the service to provide the data. Another point is: the SINGLE PAGE APPLICATION. I tried to use the Angular directive for route the pages, but with the Laravel, I didn't know how to access the pages and if the page must be html or could be php, so I used another way (hidding some parts depending where the user clicked), to keep the application in a SINGLE PAGE.

-------------------

Two approachs was used.

1 - Backend (get list of books)
  	- Create an own service to return the books 
  	- These service use Guzzle api to make a get request
  	- http://localhost:8000/movies/1

2 - Frontend (get book details)
	- Angular is responsable to request the book details

-------------------

How to run local ?

- Open moviesCtrl.js and change the host
- Access the root project folder and run:
	- composer update
	- php artisan key:generate
	- php -S localhost:8000 -t public

- Link: http://localhost:8000/

-------------------

GitHub: https://github.com/leogiovanni/upcoming-movies

Remote link: http://upcoming-movies-leo.herokuapp.com/index.php
