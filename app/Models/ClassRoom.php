<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classrooms';

    protected $fillable = [
        'name'
    ];

    public function matters()
    {
        return $this->hasMany(Matter::class, 'classroom_id');
    }
}
