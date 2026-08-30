<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    use HasFactory;
    protected $table = 'experience_details';

    protected $fillable = [
        'experience_id',
        'category_id',
        'technology_id',
    ];

    public function experienceData()
    {
        return $this->belongsTo(ExperienceData::class, 'experience_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id');
    }
}
