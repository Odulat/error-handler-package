
## Introducing

Laravel error handler package

## Install

Install Via Composer

``` bash
$ composer require pyaesone17/lapse
```

Publish vendor

``` bash
$ php artisan vendor:publish
```

Migrate tables

``` bash
php artisan migrate
```
## Usage

After that register In the captureException method of App\Exceptions\Handler like this.


``` php

    use Dulat\ErrorHandler\Facades\ErrorHandler;
    ..
    
    class Handler extends ExceptionHandler
    {
        ...
    
        public function report(Exception $exception)
        {
            ErrorHandler::captureException($e);
        }
        ...  
    }
```