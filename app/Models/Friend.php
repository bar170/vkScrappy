<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table ='friends';

    public $incrementing = false;

    public function users_vk() {
        return $this->belongsToMany(
            UserVk::class,
            'list_friends',
            'friend',
            'user_vk',
            'id',
            'id');
    }
}
