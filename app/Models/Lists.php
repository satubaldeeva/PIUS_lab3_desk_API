<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

     /**
     * get the customers that owns the address
     */
    public function  desk(){
        return $this->belongsTo(Desk::class);
    }
}
