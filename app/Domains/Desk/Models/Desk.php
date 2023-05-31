<?php

namespace App\Domains\Desk\Models;

use App\Domains\Lists\Models\Lists;
use Database\Factories\DeskFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $fillable = [
        'name',
    ];

    public function  lists(){
        return $this->hasMany(Lists::class);
    }

    public static function factory(): DeskFactory
    {
        return DeskFactory::new();
    }
}
