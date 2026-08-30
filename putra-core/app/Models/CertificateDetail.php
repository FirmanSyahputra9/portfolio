<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateDetail extends Model
{
    use HasFactory;

    protected $table = 'certificate_details';
    protected $fillable = [
        'certificate_id',
        'category_id',
        'technology_id',
    ];

    public function certificateData()
    {
        return $this->belongsTo(CertificateData::class, 'certificate_id');
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
