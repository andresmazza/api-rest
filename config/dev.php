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

require __DIR__ . '/prod.php';

$app['debug'] = true;
$app['log.level'] = Monolog\Logger::DEBUG;
