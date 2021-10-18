<?php

use App\Models\Users;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\controls\ControlUsers;
use App\controls\ControlGroups;
use App\controls\ControlAmis;


require __DIR__ . '/../vendor/autoload.php';

$db = new Capsule();
$db->addConnection(array(
 
	'driver'    => 'mysql',		 
	'host'      => 'localhost',		 
	'database'  => 'covid_app',		 
	'username'  => 'root',		 
	'password'  => '',		 
	'charset'   => 'utf8',		 
	'collation' => 'utf8_unicode_ci',		 
	'prefix'    => ''
 
));

$db->setAsGlobal();
$db->bootEloquent();


$app = AppFactory::create();



$app->get('/', function (Request $request, Response $responce, $parameters) {
    $responce->getBody()->write(' Hello World !');
    return $responce;
});

$app->get('/users', App\controls\ControlUsers::class . ':allUsers');
$app->get('/groups', App\controls\ControlGroups::class . ':allGroups');
$app->get('/friends', App\controls\ControlAmis::class . ':allAmis');
$app->get('/annonces', App\controls\ControlAnnonces::class . ':allAnnonces');
$app->get('/messages', App\controls\ControlMessages::class . ':allMessages');





$app->run();