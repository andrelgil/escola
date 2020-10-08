<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'name'
    ];

    public function matters()
    {
        return $this->belongsToMany(Matter::class);
    }
}
