<?php
namespace App\controls;
use App\models\Users;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ControlUsers
{

    public function allUsers(Request $rq, Response $rs, $args) : Response
    {
        $u = Users::all();
        foreach (Users::all() as $users) {
            echo $users->identifiant;
        }
        $rs->getBody()->write(' ------- >for users');
		return $rs;
    }

}       