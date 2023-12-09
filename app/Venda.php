<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $fillable = ['descricao', 'dt_compra','cliente_id', 'funcionario_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }


    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_vendidos');
    }


    public function produtosVendidos()
{
    return $this->hasMany(ProdutoVendido::class, 'venda_id');
}




}
