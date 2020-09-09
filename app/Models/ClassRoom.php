<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classrooms';

    protected $fillable = [
        'name'
    ];

    public function materials()
    {
        return $this->hasMany(Material::class, 'classroom_id');
    }
}
