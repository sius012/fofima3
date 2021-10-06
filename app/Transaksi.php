<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'buku_besar';
    public $timestamp = false;

    public function transaksi(){
        return $this->belongsTo('App\MainTransaksi','id_transaksi','kode_transaksi');
    }
}
