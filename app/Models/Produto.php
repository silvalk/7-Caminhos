<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco', 
        'estoque', 
        'descricao', 
        'imagem', 
        'categoria'];

public function promocao()
{
    return $this->hasOne(Promocao::class, 'produto_id');
}

}
