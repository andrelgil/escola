<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $table = 'matters';

    protected $fillable = [
        'name'
    ];

    public function classroom()
    {
        return $this->hasMany(ClassRom::class, 'matter_id');
    }
}
