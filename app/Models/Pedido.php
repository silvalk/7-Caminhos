<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'produtos', 'subtotal', 'frete', 'total', 'cep',
    ];

    protected $casts = [
        'produtos' => 'array',
    ];

public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

    
