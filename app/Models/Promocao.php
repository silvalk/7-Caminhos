<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $table = 'promocoes';

    protected $fillable = ['produto_id', 'preco_promocional'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
