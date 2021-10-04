<?php


require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function(\Slim\Http\Request $request, \Slim\Http\Response $response) {
    return $response->write('Salut Slim 3 fonctionne');
});
$app->run();