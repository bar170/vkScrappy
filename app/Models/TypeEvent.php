<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventUser;

class TypeEvent extends Model
{
    protected $table ='type_events';
    protected $fillable = ['name'];

    public function event_users() {
        return $this->hasMany(EventUser::class);
    }
}
