<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'title_id',
        'title_en',
        'introduction_id',
        'introduction_en',
        'demo',
        'source_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projectDetails()
    {
        return $this->hasMany(ProjectDetail::class, 'project_id');
    }

}
