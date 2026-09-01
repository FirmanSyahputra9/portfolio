<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectData extends Model
{
    use HasFactory;

    protected $table = 'project_data';

    protected $fillable = [
        'user_id',
        'title_id',
        'title_en',
        'introduction_id',
        'introduction_en',
        'demo',
        'source_code',
        'start_date',
        'completed_at',
        'image',
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
