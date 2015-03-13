<?php
/**
 * App Config
 *
 * PHP version 5.4
 *
 * @category   API-REST
 * @package    App
 * @subpackage Default
 * @author     Andres Mazza <andres.mazza@gmail.com>
 * @license    GPL
 * @link       https://github.com/andresmazza/api-rest
 * 
 */
namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function products()
    {
        $this->app['products.service'] = $this->app->share(function () {
            return new Services\ProductsService($this->app["db"]);
        });
    }

    public function productsList()
    {
        $this->app['productsList.service'] = $this->app->share(function () {
            return new Services\ProductsListService($this->app["db"]);
        });
    }
}
