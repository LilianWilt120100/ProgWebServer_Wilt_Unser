<?php
namespace App\Controls;
use App\Models\Annonces;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ControlAnnonces
{

    public function allAnnonces(Request $rq, Response $rs, $args) : Response
    {
        $g = Annonces::all();
        foreach (Annonces::all() as $annonces) {
            echo ($annonces->idGroup."  ".$annonces->identifiant." ".$annonces->annonceContent."\n");
        }
        $rs->getBody()->write(' ------- >for groups');
		return $rs;
    }

}       