<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    use HasFactory;

    public function candidate()
    {
        $this->belongsToMany(candidates::class, 'skill_sets');
    }
}
