<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $table = 'candidates';
    
    public function users(){
        return $this->hasMany("App\Models\User");
    }
}
