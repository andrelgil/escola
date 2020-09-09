<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom_Material extends Model
{
    protected $table = 'classrooms_materials';

    protected $fillable = [
        'classroom_id',
        'material_id',
    ];
}
