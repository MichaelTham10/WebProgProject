<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyboardCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];
}
