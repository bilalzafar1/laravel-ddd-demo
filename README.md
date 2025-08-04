Laravel DDD Demo

A Laravel 12 demo application implementing Domain-Driven Design (DDD) principles for an Order Management System.

Setup

Clone the repository:

git clone https://github.com/bilalzafar1/laravel-ddd-demo.git
cd laravel-ddd-demo



Install dependencies:

composer install


Copy the .env.example to .env and configure your database:
cp .env.example .env


Generate an application key:
php artisan key:generate


Run migrations:
php artisan migrate


Start the server:
php artisan serve

Usage

Create an order via the API:

curl -X POST http://127.0.0.1:8000/api/orders -H "Content-Type: application/json" -d '{
    "id": 1,
    "amount": 99.99,
    "currency": "USD",
    "status": "pending"
}'

Structure


app/Domain/Orders: Core business logic (Entities, Value Objects, Repositories, Services).
app/Infrastructure/Orders: Framework-specific implementations (Eloquent models, repositories).
app/Application/Orders: Application services orchestrating business use cases.

Inspired By

LaraCraftHub/DDD-Template

Contributing

Feel free to submit issues or pull requests to enhance this demo.
