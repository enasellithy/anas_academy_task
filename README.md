# LARAVEL 10

## Requirements
- php 8.1
- node
- composer

## Install
- git clone https://github.com/enasellithy/anas_academy_task
- cd anas_academy_task
- composer install (Note if have some error when run (composer install) try this composer install --ignore-platform-reqs)
- npm install
- npm run build
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan serv
- php artisan migrate --seed
- php artisan serve --port=8000
- in .env add this
  STRIPE_KEY=
  STRIPE_SECRET=
  STRIPE_WEBHOOK_SECRET=
  CASHIER_CURRENCY=
  CASHIER_CURRENCY_LOCALE=
  CASHIER_LOGGER=

# packages in app
- composer require laravel/jetstream

## APP Task Requirements

### Section 1
#### Routing:
- Create a Laravel route that directs to a controller method. => /
- Implement a route parameter and retrieve its value in the controller. => /hello/{param} => #Note(any param will put in url)

#### Routing:
- Create a custom middleware that logs the incoming request. => (\App\Http\Middleware\CustomMiddleware::class)
- Apply the middleware to a specific route. => /custom_auth

### Section 2
#### Eloquent ORM
- Create a model for a "Product" with fields: name, price, and quantity => (App\Models\Product::class) & migration file
- Implement a query to fetch all products with a price greater than a specified amount (App\Models\Product::class) => Scope in ScopeGetGreateThan

#### Migrations and Seeders
- Create a migration to add a new column "category_id" to the
  "products" table. => in migrations folder
- Create a seeder to populate the "category_id" with random
  values. => in seeder and factories folder

### Section 3
#### Authentication
- Implement user authentication using Laravel's built-in authentication system => i used Sanctum and livewire to front
- Create a middleware to ensure only authenticated users can access certain routes => (app/Http/Middleware/Authenticated) => Route (secretPage)


## API 
### Auth
- register => post
- login => post 
