<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";
    protected $fillable = ['nome_fun', 'telefone'];

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'funcionario_id');
    }

}
