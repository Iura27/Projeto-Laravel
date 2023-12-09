<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Venda;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'preco', 'qtd', 'tipo_tinta_id'];

    public function tipo_tinta() {
        return $this->belongsTo("App\TipoTinta");
    }


}

