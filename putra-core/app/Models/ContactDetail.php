<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_data_id',
        'platform',
        'name',
        'icon',
        'url',
    ];
    public function contactData()
    {
        return $this->belongsTo(ContactData::class, 'contact_id');
    }
}
