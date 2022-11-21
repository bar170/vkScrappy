<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class TypeEvent extends Model
{
    protected $table ='type_events';
    protected $fillable = ['name'];

    public function events() {
        return $this->hasMany(Event::class);
    }
}
