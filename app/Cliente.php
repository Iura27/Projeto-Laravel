<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nome_cli', 'telefone', 'endereco', 'cpf',];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'cliente_id');
    }

}
