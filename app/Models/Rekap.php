<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    public $table = 'rekap_suara';
    
    protected $fillable = [
        'candidat_id', 
        'ip_address'
    ];
}
