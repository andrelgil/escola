<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    //public function classroom()
    //{
    //    return $this->hasMany(ClassRom::class, 'material_id');
    //}
}
