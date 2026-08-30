<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $table = 'technologies';

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function projectDetails()
    {
        return $this->belongsToMany(ProjectDetail::class);
    }
}
