<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    use HasFactory;

    protected $fillable = ['name, email, phone, job_id, year'];

    public function jobs()
    {
        return $this->belongsTo(jobs::class);
    }

    public function skills()
    {
        return $this->belongsToMany(skills::class, 'skill_sets');
    }
}
