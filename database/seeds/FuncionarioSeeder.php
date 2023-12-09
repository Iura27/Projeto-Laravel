<?php

use Illuminate\Database\Seeder;
use App\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create(['nome_fun' => 'Juliana da Silva', 'telefone' => '5499484945']);
        Funcionario::create(['nome_fun' => 'Leticia Oliveira', 'telefone' => '54789456123']);
        Funcionario::create(['nome_fun' => 'Paola Moraes', 'telefone' => '5489321458' ]);
        Funcionario::create(['nome_fun' => 'Bruno Ribeiro', 'telefone' => '54789574831']);
        Funcionario::create(['nome_fun' => 'Antonio Carlos', 'telefone' => '54782100236']);
        Funcionario::create(['nome_fun' => 'André Herrique', 'telefone' => '5412398746']);
        Funcionario::create(['nome_fun' => 'João Silva', 'telefone' => '547991345']);
    }
}
