# Documentation

Welcome to the documentation for this app! This guide will help you get started with installing and using our website built with Laravel and Inertia. Please follow the instructions below to set up and explore the features of our platform.

## Prerequisites

-   PHP >= 7.4
-   Composer
-   Node.js >= 14
-   NPM

## Installation

```
    $ git clone git@github.com:ilhaammulia/no-pressure.git
    $ cd no-pressure
    $ composer install
```

After the installation success, go to the next steps.

```
    $ cp .env.example .env
    $ php artisan key:generate
```

Configure the database connetion on `.env`

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1 // Change to your database host
    DB_PORT=3306 // Change to your database port
    DB_DATABASE=pins_website // Change to your database name
    DB_USERNAME=root
    DB_PASSWORD=
```

Last steps.

```
    $ php artisan migrate
    $ npm install
    $ npm run dev
```

## Configuration

-   Customize the application settings in the `.env` file.
-   Modify the routes, controllers, and views as per your requirements.

## Usage

    1. Start the development server with `php artisan serve`.
    2. Access the website in your browser at `http://localhost:8000` (or the specified URL).

## Support

For any further assistance or inquiries, please reach me out at ilham@admin.com. I am here to help!

Thank you for choosing my app. Enjoy exploring the platform and creating an amazing pinning experience!
