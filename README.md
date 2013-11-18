# Mersonal is a PHP 5.3+ Personal Micro Framework inspired by Synatra or Silex.

## Usage

Create a composer.json:

```
{
    "autoload": {
        "psr-0": {
            "": "lib/"
        }
    } 
}
```

Run

```
php composer.phar install
```

Or update your composer.phar

```
php composer.phar update
```

Require the vendor/autoload.php file and create an instance of mersonal framework

```php
// Require the vendor/autoload.php file
require_once __DIR__ . '/vendor/autoload.php';

// create an instance of mersonal framework
$app = new Florent\Mersonal();
```

## Routing

```php
// any route
$app->map('/foo', function() { // Code... });

// GET|POST|PUT|DELETE route
$app->get('/foo', function() { // Code... });
$app->post('/foo', function() { // Code... });
$app->put('/foo', function() { // Code... });
$app->delete('/foo', function() { // Code... });

// Dynamic routing
$app->map('/foo/{bar}', function($bar) { // Code... });
```

## Organize the controllers for the different routes in classes

Update your composer.json:

```
"psr-0": {
    "YourNamespace": "path/to/your/controllers/"
}
```

Run

```
php composer.phar update
```

Defined a route

```php
$app->map('/foo', array(new Acme\FooController()), 'barAction'));
```

## Tips: use helpers to short route definitions

Update your composer.json:

```
"files": [
    "lib/helpers.php"
]
```

Run

```
php composer.phar update
```

Use short route definition

```php
map('/foo', function() { // Code... });
```

## No route matched

```php
// no route matched
exit('Not found!');
```