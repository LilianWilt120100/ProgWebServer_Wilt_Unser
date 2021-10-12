<?php

use App\Models\User;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('../app/config/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$app = AppFactory::create();

if($db::connection()->getDatabaseName())
   {
     echo "Connected sucessfully to database ".$db::connection()->getDatabaseName();
   }
$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write('  Hello World !');
    return $responce;
});

$app->run();
