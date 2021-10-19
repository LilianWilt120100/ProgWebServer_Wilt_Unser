<?php
namespace App\Controls;
use App\Models\Groupes;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlGroups
{

    public function allGroups(Request $rq, Response $rs, $args) : Response
    {
        $g = Groupes::all();
        foreach (Groupes::all() as $groups) {
            echo ($groups->idGroup."    ".$groups->nameGroup."\n");
        }
        $rs->getBody()->write(' ------- >for groups');
		return $rs;
    }

}       