<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomtype',
        'roomimg',
        'description',
        'cost',
        'status'
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
