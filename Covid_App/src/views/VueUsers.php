<?php

namespace App\vues;

class VueUsers {

	private $tab; 

    private function lesUsers(){
		//var_dump($this->tab); // tableau de tableau, array de array
		$html = '';
		foreach($this->tab as $users){
			$html .= "<li>{$users['identifiant']}, {$users['nom']}</li>";
		}
		$html = "<ul>$html</ul>";
		return $html;
	}
}