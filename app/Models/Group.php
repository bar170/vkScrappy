<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;

class Group extends Model
{
    protected $table ='groups';
    protected $fillable = ['id', 'group_vk_id', 'name'];

    public function targets() {
        return $this->belongsToMany(
            Target::class,
            'list_groups',
            'group_id',
            'target_id',
            'id',
            'id');
    }

}
