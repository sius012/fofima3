<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainTransaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $fillable = ['kode_transaksi','tanggal'];

    public function user(){
        return $this->belongsTo('App\User','id','id_user');
    }

    public function transaksi(){
        return $this->hasMany('App\Transaksi','id','id_transaksi');
    }
}
