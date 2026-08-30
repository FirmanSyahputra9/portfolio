<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroButton extends Model
{
    use HasFactory;

    protected $table = 'hero_buttons';

    protected $fillable = [
        'label_id',
        'label_en',
        'url',
        'action',
    ];
}
