<?php

namespace App\Controls;

use App\Models\Users;
use App\Vues\VueUsers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlUsers
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function allUsers(Request $rq, Response $rs, $args): Response
    {
        foreach (Users::all() as $users) {
            echo ("Identifiant : " . $users->identifiant . " ; Nom : " . $users->nom . " ; Prénom : " . $users->prenom . "<br>");
        }
        $rs->getBody()->write(' -------> for users table');
        return $rs;
    }


    public  function inscription()
    {
        $vues = new VueUsers($this->container);
    }
}
