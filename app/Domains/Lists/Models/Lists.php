<?php

namespace App\Domains\Lists\Models;

use App\Domains\Desk\Models\Desk;
use Database\Factories\ListsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{

    protected $fillable = [
        'name',
        'desk_id',
        'description',
    ];

     /**
     * get the customers that owns the address
     */
    public function  desk(){
        return $this->belongsTo(Desk::class);
    }

    public static function factory(): ListsFactory
    {
        return ListsFactory::new();
    }
}
