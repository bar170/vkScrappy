<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserVk;
class Group extends Model
{
    protected $table ='groups';
    protected $fillable = ['name'];

    public $incrementing = false;

    public function users_vk() {
        return $this->belongsToMany(
            UserVk::class,
            'list_groups',
            'group',
            'user_vk',
            'id',
            'id');
    }

}
