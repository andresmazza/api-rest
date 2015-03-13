<?php
/**
 * App Config
 *
 * PHP version 5.4
 *
 * @category   API-REST
 * @package    Config
 * @subpackage Default
 * @author     Andres Mazza <andres.mazza@gmail.com>
 * @license    GPL
 * @link       https://github.com/andresmazza/api-rest
 * 
 */
use App\RoutesLoader;

define("ROOT_PATH", __DIR__ . "/..");

$app['monolog.logfile'] = ROOT_PATH . "/var/logs/app.log";

$app['api.version'] = "/v1";
$app['api.endpoint'] = "/api";

$app['db.config']= array(
	"db.options" => array(
        "driver" => "pdo_sqlite",
        "path" => realpath(ROOT_PATH . "/var/app.db"),
    ),
);

$app['http.user'] = 'demo';
$app['http.pass'] = 'demo';

// Load Routes
$routesLoader = new App\RoutesLoader($app);
$routesLoader->products();
$routesLoader->productsList();
