<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\TipoTinta;

class TipoTinta extends Model
{
    protected $table = "tipo_tintas";
    protected $fillable = ['descricao'];

    public function produtos() {
        return $this->hasMany("App\Produto");
    }
}
