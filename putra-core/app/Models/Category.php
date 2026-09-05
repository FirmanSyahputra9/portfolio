<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function projectDetails()
    {
        return $this->hasMany(ProjectDetail::class);
    }


    public function experienceDetails()
    {
        return $this->hasMany(ExperienceDetail::class);
    }

    public function certificateDetails()
    {
        return $this->hasMany(CertificateDetail::class);
    }

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class);
    }
}
