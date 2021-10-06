<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
    protected $table = 'nomor_perkiraan';
    protected $primary_key = 'nmr_perkiraan';
    public $incrementing = false;
    public $keyType = 'string';
}
