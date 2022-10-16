<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVk extends Model
{
    protected $fillable = ['gender', 'name', 'birthday', 'link', 'probability_bot'];
}
