<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;
    protected $table = 'education_details';

    protected $fillable = [
        'education_id',
        'category_id',
        'technology_id',
    ];

    public function educationData()
    {
        return $this->belongsTo(EducationData::class, 'education_id');
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
