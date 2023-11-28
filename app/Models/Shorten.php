<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shorten extends Model
{
    use HasFactory;

    protected $table = 'shortens';

    protected $fillable = [
        'original_url',
        'shorten_code',
    ];
}
