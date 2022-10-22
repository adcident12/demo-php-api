<?php

define("BASEPATH", true);

use AltoRouter as Router;

require_once realpath(__DIR__ . "/vendor/autoload.php");

$router = new Router();

$router->map('GET', '/', function () {
    require __DIR__ . '/view/landing.php';
});

$router->map('GET', '/api/documentation', function () {
    require __DIR__ . '/documentation/index.php';
});

$router->map('POST', '/api/v1/auth', function () {
    require __DIR__ . '/api/auth/auth.php';
});

$router->map('POST', '/api/v1/register', function () {
    require __DIR__ . '/api/auth/register.php';
});

$router->map('GET', '/api/v1/user', function () {
    require __DIR__ . '/api/user/get_all.php';
});

$router->map('GET', '/api/v1/user/[i:id]', function ($id) {
    require __DIR__ . '/api/user/get_by_id.php';
});

$router->map('POST', '/api/v1/user/create', function () {
    require __DIR__ . '/api/user/create.php';
});

$router->map('POST', '/api/v1/user/[i:id]/update', function ($id) {
    require __DIR__ . '/api/user/update.php';
});

$router->map('POST', '/api/v1/user/[i:id]/delete', function ($id) {
    require __DIR__ . '/api/user/delete.php';
});

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
