# Restaurant App

## Description

This is a restaurant app that allows users to view, add, and delete menu items. It is built using the Laravel framework
and uses a MySQL database. The app is hosted on Heroku and can be
viewed [here](https://restaurant-app-2020.herokuapp.com/).

## Installation

To install this app, you will need to have [Composer](https://getcomposer.org/)
and [Laravel](https://laravel.com/docs/7.x/installation) installed on your machine. You will also need to have a MySQL
database set up. Once you have these installed, you can clone this repository and run the following commands:

```
composer install

php artisan migrate

php artisan serve
```

You will also need to create a .env file in the root directory of the project and add the following lines:

```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

You will need to fill in the values for the database host, port, name, username, and password.

## Usage

Once the app is installed, you can view it by running the following command:

```
php artisan serve
```

You can then view the app in your browser at http://localhost:8000.

## Technologies Used

- [Laravel](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Alpine.js](https://alpinejs.dev/)
- [Livewire](https://laravel-livewire.com/)
