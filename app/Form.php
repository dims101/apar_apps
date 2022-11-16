<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'id_user','id_apar','tuas','segel_tuas','pin','selang','nozzle','pressure','tabung','barcode','keterangan','status'
    ];
}
