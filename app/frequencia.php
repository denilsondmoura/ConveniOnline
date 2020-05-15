<?php

namespace App;

use Jenssegers\Mongodb\Eloquente\Model as Eloquente;
use Illuminate\Database\Eloquent\Model;

class frequencia extends Eloquente
{
    protected $conection =mongodb;
    protected $collection=frequencias;
    protected $keytype='string';
    protected $incrementing=false;
    //
}
