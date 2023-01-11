<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill_sets extends Model
{
    use HasFactory;

    public $fillable = ['candidate_id', 'skill_id'];
    public $timestamps = false;
}
