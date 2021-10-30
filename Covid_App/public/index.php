<?php

session_start();

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\middleware\cors;
use DI\Container;
use Slim\Csrf\Guard;
use App\Controls\ControlUsers;
use App\Controls\ControlGroups;
use App\Controls\ControlAmis;
use App\Controls\ControlAnnonces;
use App\Controls\ControlMessages;

require __DIR__ . '/../vendor/autoload.php';

$db = new Capsule();
// Configuration de docker compose
/*
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
*/
// Configuration normal 
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

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

// Create Container
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$responseFactory = $app->getResponseFactory();

// Register Middleware On Container
$container->set('csrf', function () use ($responseFactory) {
    return new Guard($responseFactory);
});

// Register Middleware To Be Executed On All Routes
$app->add('csrf');

// CORS
$app->add(new cors());

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