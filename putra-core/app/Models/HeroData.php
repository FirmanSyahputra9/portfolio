<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroData extends Model
{
    use HasFactory;

    protected $table = 'hero_data';

    protected $fillable = [
        'user_id',
        'name_id',
        'name_en',
        'role_id',
        'role_en',
        'image',
        'summary_id',
        'summary_en',
        'role_description_id',
        'role_description_en',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
