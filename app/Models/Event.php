<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEvent;
use App\Models\UserVk;

class Event extends Model
{
    protected $table ='events';
    protected $fillable = ['value'];

    public function type_event() {
        return $this->belongsTo(TypeEvent::class);
    }
    public function target() {
        return $this->belongsTo(UserVk::class);
    }
}
