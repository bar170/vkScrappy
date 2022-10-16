<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEvent;
use App\Models\UserVk;

class EventUser extends Model
{
    protected $table ='event_users';
    protected $fillable = ['value'];

    public function type_events() {
        return $this->belongsTo(TypeEvent::class);
    }
    public function users_vk() {
        return $this->belongsTo(UserVk::class);
    }
}
