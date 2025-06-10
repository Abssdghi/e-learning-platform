<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'teacher',
        'start_date'
    ];

    protected $casts = [
        'start_date' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
