<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    protected $fillable = [
        'name'
    ];

    public function classroom()
    {
        return $this->hasMany(ClassRom::class, 'material_id');
    }
}
