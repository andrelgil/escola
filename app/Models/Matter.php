<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $table = 'matters';

    protected $fillable = [
        'name'
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_matter');
    }

    public function hasRoom(Room $room)
    {
        return $this->rooms->contains($room);
    }
}
