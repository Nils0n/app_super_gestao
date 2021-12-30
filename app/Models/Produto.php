<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['fornecedor_id','nome' , 'descricao' , 'peso' , 'unidade_id'];

    public function detalhe(){
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function fornecedor(){
        return $this->hasMany(Fornecedor::class);
    }
}
