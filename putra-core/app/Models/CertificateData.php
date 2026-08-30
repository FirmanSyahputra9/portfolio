<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateData extends Model
{
    use HasFactory;

    protected $table = 'certificate_data';
    protected $fillable = [
        'user_id',
        'title_id',
        'title_en',
        'issuer_id',
        'description_id',
        'description_en',
        'issued_date',
        'expiration_date',
        'credential_id',
        'credential_url',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function certificateDetails()
    {
        return $this->hasMany(CertificateDetail::class, 'certificate_id');
    }

    public function issuer()
    {
        return $this->belongsTo(Issuer::class);
    }
}
