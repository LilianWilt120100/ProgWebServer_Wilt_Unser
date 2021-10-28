<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Controls\ControlUsers;
use App\Controls\ControlGroups;
use App\Controls\ControlAmis;
use App\Controls\ControlAnnonces;
use App\Controls\ControlMessages;

require __DIR__ . '/../vendor/autoload.php';

$db = new Capsule();
$db->addConnection(array(
 
	'driver'    => 'mysql',		 
	'host'      => 'db',		 
	'database'  => 'covid_app',		 
	'username'  => 'unutilisateur',		 
	'password'  => 'lemotdepasse',	 
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

$app->get('/users', ControlUsers::class . ':allUsers');
$app->get('/groups', ControlGroups::class . ':allGroups');
$app->get('/friends', ControlAmis::class . ':allAmis');
$app->get('/annonces', ControlAnnonces::class . ':allAnnonces');
$app->get('/messages', ControlMessages::class . ':allMessages');

$app->run();