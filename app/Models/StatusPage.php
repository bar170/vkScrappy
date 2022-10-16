<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserVk;

class StatusPage extends Model
{
    protected $table ='status_pages';
    protected $fillable = ['name'];

    public function users_vk() {
        return $this->hasMany(UserVk::class);
    }
}
