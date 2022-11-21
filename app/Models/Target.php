<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Group;
use App\Models\StatusPage;
use App\Models\Location;
use App\Models\Friend;
use App\Models\User;

class Target extends Model
{
    protected $table ='targets';
    protected $fillable = ['id', 'gender', 'name', 'birthday', 'link', 'probability_bot', 'last_online', 'vk_id', 'status_page_id'];

    public function events() {
        return $this->belongsToMany(
            Event::class,
            'list_events',
            'target_id',
            'event_id',
            'id',
            'id');
    }

    public function groups() {
        return $this->belongsToMany(
            Group::class,
            'list_groups',
            'target_id',
            'group_id',
            'id',
            'id');
    }

    public function friends() {
        return $this->belongsToMany(
            Friend::class,
            'list_friends',
            'target_id',
            'friend_id',
            'id',
            'id');
    }

    public function status_page() {
        return $this->belongsTo(StatusPage::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
