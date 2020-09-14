<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';

    protected $fillable = [
        'user_id',
        'classroom_id',
        'material_id',
        'two_month',
        'file',
        'filename'
    ];
}
