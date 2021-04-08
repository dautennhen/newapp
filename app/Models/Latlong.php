<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Latlong extends Model {

    protected $table = 'latlong';
    
    protected $fillable = [
        'person_id', 'lat', 'long', 'datetime'
    ];
    public $timestamps = false;

}
