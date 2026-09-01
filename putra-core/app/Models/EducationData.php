<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationData extends Model
{
    use HasFactory;
    protected $table = 'education_data';

    protected $fillable = [
        'user_id',
        'institution_id',
        'institution_en',
        'degree',
        'field_of_study_id',
        'field_of_study_en',
        'final_grade',
        'description_id',
        'description_en',
        'location',
        'start_date',
        'end_date',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class, 'education_id');
    }
}
