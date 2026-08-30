<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceData extends Model
{
    use HasFactory;

    protected $table = 'experience_data';

    protected $fillable = [
        'user_id',
        'position',
        'company',
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

    public function experienceDetails()
    {
        return $this->hasMany(ExperienceDetail::class, 'experience_id');
    }
}
