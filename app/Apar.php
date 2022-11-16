<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apar extends Model
{
    protected $fillable = [
        'id_lokasi','qr_apar','merk','jenis','deskripsi','kode_qr','memo','exp_date','warn_date'
    ];
}
