<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Venda;

class ProdutoVendido extends Model
{
    protected $table = "produto_vendidos";
    protected $fillable = [ 'venda_id', 'produto_id' ];


    public function produto()
{
    return $this->belongsTo(Produto::class, 'produto_id');
}


    public function vendas()
{
    return $this->belongsToMany(Venda::class, 'produto_vendidos');
}

}

