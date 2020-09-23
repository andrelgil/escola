<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';

    protected $fillable = [
        'name'
    ];

    //public function classroom()
    //{
    //    return $this->hasMany(ClassRom::class, 'material_id');
    //}
}
