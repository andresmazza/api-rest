<?php
/**
 * Inedex
 *
 * PHP version 5.4
 *
 * @category   API-REST
 * @package    API
 * @subpackage Default
 * @author     Andres Mazza <andres.mazza@gmail.com>
 * @license    GPL
 * @link       https://github.com/andresmazza/api-rest
 * 
 */

require_once __DIR__ . '/../vendor/autoload.php';


$app = new Silex\Application();

require __DIR__ . '/../config/prod.php';
require __DIR__ . '/../src/app.php';


$app->run();
