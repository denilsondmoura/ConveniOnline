<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class teste extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'testes';

    
}
