<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;

class Friend extends Model
{
    protected $table ='friends';
    protected $fillable = ['id', 'vk_id'];

    public function targets() {
        return $this->belongsToMany(
            Target::class,
            'list_friends',
            'friend_id',
            'target_id',
            'id',
            'id');
    }
}
