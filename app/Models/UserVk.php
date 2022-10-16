<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventUser;
use App\Models\Group;
use App\Models\StatusPage;
use App\Models\Location;
use App\Models\Friend;

class UserVk extends Model
{
    protected $table ='users_vk';
    protected $fillable = ['id', 'gender', 'name', 'birthday', 'link', 'probability_bot'];

    public $incrementing = false;
    public function event_users() {
        return $this->hasMany(EventUser::class);
    }

    public function groups() {
        return $this->belongsToMany(
            Group::class,
            'list_groups',
            'user_vk',
            'group',
            'id',
            'id');
    }

    public function friends() {
        return $this->belongsToMany(
            Friend::class,
            'list_friends',
            'user_vk',
            'friend',
            'id',
            'id');
    }

    public function status_page() {
        return $this->belongsTo(StatusPage::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }


}
