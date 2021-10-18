<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Annonces extends Model{

    protected $table = 'annonces';
    protected $primarykey=['identifiant',"idGroup"];


}