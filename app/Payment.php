<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function client_id()
    {
        return $this->belongsTo('App\Client', 'foreign_key','id');
    }
}
