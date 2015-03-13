<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        
        $this->app['productsList.controller'] = $this->app->share(function () {
            return new Controllers\ProductsListController($this->app['productsList.service'],$this->app['products.service']);
        });

        $this->app['products.controller'] = $this->app->share(function () {
            return new Controllers\ProductsController($this->app['products.service']);
        });       
    }

    
    public function products()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/products', "products.controller:getAll");
        $api->post('/product', "products.controller:save");
        $api->get('/product/{id}', "products.controller:getProduct"); 
        $api->put('/product/{id}', "products.controller:update");        
        $api->delete('/product/{id}', "products.controller:delete");

        $this->app->mount($this->app["api.endpoint"].$this->app["api.version"], $api);
    }

    public function productsList()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/productsList', "productsList.controller:getAll");
        $api->get('/productsList/{name}', "productsList.controller:ListByName");
     
        $this->app->mount($this->app["api.endpoint"].$this->app["api.version"], $api);
    }

}

