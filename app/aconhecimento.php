<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class aconhecimento extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'aconhecimentos';
    protected $keyType = 'string';
    public $incrementing = false;
}
