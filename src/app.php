<?php

use App\RoutesLoader;
use App\ServicesLoader;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->before(function() use ($app)
{
    if (!isset($_SERVER['PHP_AUTH_USER']))
    {
        header("WWW-Authenticate: Basic realm='API-REST'");
        return new JsonResponse(array('Message' => 'Not Authorised'), 401);
    }
    else
    {      
        $users = array($app['http.user'] => $app['http.pass']);

        if($users[$_SERVER['PHP_AUTH_USER']] !== $_SERVER['PHP_AUTH_PW'])
        {
            return new JsonResponse(array('Message' => 'Forbidden'), 403);
        }
    }
});

$app->before(function (Request $request) {
    if (strpos($request->headers->get('Content-Type'), 'application/json') === 0) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(
          is_array($data) ? $data : array()
        );
    }
});

$app->after(function (Request $request, Response $response) {
  $response->headers->set('Access-Control-Allow-Origin', '*');
});



$app->register(new ServiceControllerServiceProvider());
$app->register(new DoctrineServiceProvider(), $app['db.config']);
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    "monolog.logfile" => $app['monolog.logfile']
));

//load services
$servicesLoader = new App\ServicesLoader($app);
$servicesLoader->products();
$servicesLoader->productsList();

$app->error(function (\Exception $e, $code) use ($app) {
    return new JsonResponse(
      array("statusCode" => $code, "message" => $e->getMessage(), "stacktrace" => $e->getTraceAsString()));
});

return $app;
