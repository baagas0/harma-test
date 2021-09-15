# Harma Digital Programmer Test
# Metronic 7 + Laravel 7

### Introduction

...

### Installation

Laravel has a set of requirements in order to ron smoothly in specific environment. Please see [requirements](https://laravel.com/docs/7.x#server-requirements) section in Laravel documentation.

Metronic similarly uses additional plugins and frameworks, so ensure You have [Composer](https://getcomposer.org/) and [Node](https://nodejs.org/) installed on Your machine.

Assuming your machine meets all requirements - let's process to installation of Metronic Laravel integration (skeleton).

1. Open in cmd or terminal app and navigate to apache server path
2. run git clone https://github.com/baagas0/harma-test.git
3. Open in cmd or terminal app and navigate to this folder
4. Run following commands

```bash
on terminal
composer install
```

```bash
on terminal
cp .env.example .env
```

```bash
Set up database configuration on .env file
```

```bash
on terminal
php artisan key:generate
```

```bash
on terminal
php artisan migrate:fresh --seed
```

```bash
on terminal
npm install && npm run dev
```

```bash
on terminal
php artisan serve
```

And navigate to generated server link (http://127.0.0.1:8000/login)

```bash
For login
email : admin@mail.com
pass  : 12345
```

### Copyright

...
