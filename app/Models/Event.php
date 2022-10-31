<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeEvent;
use App\Models\Target;

class Event extends Model
{
    protected $table ='events';
    protected $fillable = ['value', 'type_event_id'];

    public function type_event() {
        return $this->belongsTo(TypeEvent::class);
    }

    public function targets() {
        return $this->belongsToMany(
            Event::class,
            'list_events',
            'event_id',
            'target_id',
            'id',
            'id');
    }
}
