<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutData extends Model
{
    use HasFactory;

    protected $table = 'about_data';

    protected $fillable = [
        'user_id',
        'about_description_id',
        'about_description_en',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
