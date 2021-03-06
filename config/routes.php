<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup('/api', static function (): void {
    Router::get('/welcome', [\App\Controller\WelcomeController::class, 'index']);
    Router::post('/restaurants', [\App\Controller\RestaurantController::class, 'create']);
    Router::post('/supplies', [\App\Controller\SupplyController::class, 'create']);
    Router::get('/supplies/{id}', [\App\Controller\SupplyController::class, 'show']);
});