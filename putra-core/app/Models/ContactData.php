<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    use HasFactory;

    protected $table = 'contact_data';

    protected $fillable = [
        'user_id',
        'contact_title_id',
        'contact_title_en',
        'contact_description_en',
        'contact_description_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contactDetails()
    {
        return $this->hasMany(ContactDetail::class, 'contact_id');
    }

}
