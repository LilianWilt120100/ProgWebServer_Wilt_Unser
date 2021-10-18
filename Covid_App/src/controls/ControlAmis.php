<?php
namespace App\controls;
use App\models\Amis;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ControlAmis
{

    public function allAmis(Request $rq, Response $rs, $args) : Response
    {
        $a = Amis::all();
        foreach (Amis::all() as $amis) {
            echo ($amis->identifiant1."    ".$amis->identifiant2."\n");
        }
        $rs->getBody()->write(' ------- >for amis');
		return $rs;
    }

}       