<?php
use Igoframework\Core\App;
use Igoframework\Core\Routing\Router;

$app = new App();

// правила маршрутизации для административной части сайта
Router::add('^admin$', ['controller' => 'comment', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<action>[a-z-]+)?$', ['controller' => 'comment', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^store$', ['controller' => 'main', 'action' => 'store']);
// правила маршрутизации по умолчанию
Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// перенаправление на нужный маршрут
Router::dispatch($query);