<?php

// require the vendor/autoload.php file
require_once __DIR__ . '/vendor/autoload.php';

// create an instance of mersonal framework
$app = new Florent\Mersonal();

// any route
$app->map('/', function() {
    echo "Welcome!";
});

// dynamic routing
$app->map('/hello/{name}', function($name) {
    echo "Hello, {$name}!";
});

// organize the controllers for the different routes in classes
$app->map('/foo', array(new Acme\FooController(), 'barAction'));

// use the helpers function to short route definitions
map('/hi', function() {
    echo "Hi!";
});

// no route matched
exit('Not found!');