<?php
namespace App\controls;
use App\models\Messages;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ControlMessages
{

    public function allMessages(Request $rq, Response $rs, $args) : Response
    {
        $g = Messages::all();
        foreach (Messages::all() as $messages) {
            echo ($messages->idMessage."    ".$messages->content."\n");
        }
        $rs->getBody()->write(' ------- >for messages');
		return $rs;
    }

}       