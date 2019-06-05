## Rendezvous - Backend RESTful API for a social network

Build on [Laravel Framework](https://laravel.com/).

## About Rendezvous

Rendezvous is open source social network for dating. 
This social network is designed to bring people together by interests. It can be used in different areas because it is easy to transform.

## Getting Started

#### Install dependencies
```bash
composer install
```

#### Create and configure your .env file
```bash
cp .env.example .env
```

#### Install npm package globally
```bash
npm install -g laravel-echo-server
```

#### Configure your laravel-echo-server.json file
```bash
cp laravel-echo-server.json.example laravel-echo-server.json
```

#### Start [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server)
```bash
laravel-echo-server start
```

#### Start app on localhost
* Start PHP development server
* Start processing jobs on the queue as a daemon
* Start redis-server for queue driver
```bash
php artisan serve
php artisan queue:work
redis-server
```
