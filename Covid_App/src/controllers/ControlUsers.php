<?php
namespace App\Controls;
use App\Models\Users;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlUsers
{

    public function allUsers(Request $rq, Response $rs, $args) : Response
    {
        foreach (Users::all() as $users) {
            echo ("Identifiant : ".$users->identifiant." ; Nom : ".$users->nom. " ; Prénom : ".$users->prenom."\n");
        }
        $rs->getBody()->write(' -------> for users table');
		return $rs;
    }

}       