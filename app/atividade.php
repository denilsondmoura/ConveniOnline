<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class atividade extends Eloquent
{
    protected $connection ='mongodb';
    protected $collection ='atividades';
    protected $KeyType ='string';
    public $incrementing='false';
}
