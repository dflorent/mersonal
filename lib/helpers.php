<?php
// helpers
function map($route, $callback) { $app = new Florent\Mersonal(); $app->map($route, $callback); }
function get($route, $callback) { $app = new Florent\Mersonal(); $app->get($route, $callback); }
function post($route, $callback) { $app = new Florent\Mersonal(); $app->post($route, $callback); }
function put($route, $callback) { $app = new Florent\Mersonal(); $app->put($route, $callback); }
function delete($route, $callback) { $app = new Florent\Mersonal(); $app->delete($route, $callback); }