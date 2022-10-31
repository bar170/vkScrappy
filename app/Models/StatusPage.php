<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;

class StatusPage extends Model
{
    protected $table ='status_pages';
    protected $fillable = ['name'];

    public function targets() {
        return $this->hasMany(Target::class);
    }
}
