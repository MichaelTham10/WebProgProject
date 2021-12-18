<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'keyboard_id', 'qty'
    ];

    public function keyboard()
    {
        return $this->belongsTo('App\Models\Keyboard');
    }
}
