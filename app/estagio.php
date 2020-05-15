<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class estagio extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'estagios';
    protected $keyType = 'string';
    public $incrementing = false;
}
