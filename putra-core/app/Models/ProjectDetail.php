<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $table = 'project_details';

    protected $fillable = [
        'project_id',
        'category_id',
        'technology_id',
    ];

    public function projectData()
    {
        return $this->belongsTo(ProjectData::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

}
