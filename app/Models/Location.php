<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;

class Location extends Model
{
    protected $table ='locations';
    protected $fillable = ['name'];

    public function users_vk() {
        return $this->hasMany(Target::class);
    }
}
