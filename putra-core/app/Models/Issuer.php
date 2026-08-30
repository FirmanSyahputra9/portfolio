<?php

namespace App\Models;

use App\Livewire\Section\Certificate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    use HasFactory;

    protected $table = 'issuers';

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'url',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
