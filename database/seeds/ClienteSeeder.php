<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(['nome_cli' => 'Augusto da Silva', 'telefone' => '5499484945', 'endereco' => 'Rua das Flores, 123 - Bairro Jardim Primavera', 'cpf' => '064486466554']);
        Cliente::create(['nome_cli' => 'Matheus Oliveira', 'telefone' => '54789456123', 'endereco' => 'Avenida Central, 456 - Bairro Centro - Cidade Fictícia ', 'cpf' => '0216161816']);
        Cliente::create(['nome_cli' => 'Julia Moraes', 'telefone' => '5489321458', 'endereco' => 'Praça da Liberdade, 789 - Bairro Liberdade', 'cpf' => '612061502610']);
        Cliente::create(['nome_cli' => 'Fabiana Ribeiro', 'telefone' => '54789574831', 'endereco' => 'Travessa das Oliveiras, 321 - Bairro São Paulo ', 'cpf' => '021602160']);
        Cliente::create(['nome_cli' => 'Pedro Antonio', 'telefone' => '54782100236', 'endereco' => 'Alameda dos Ipês, 654 - Bairro Bela Vista - Cidade Fictícia', 'cpf' => '102120651206']);
        Cliente::create(['nome_cli' => 'Juca Silveira', 'telefone' => '5412398746', 'endereco' => 'Rua dos Coqueiros, 987 - Bairro Praia Grande - Cidade Fictícia', 'cpf' => '010425225225']);
        Cliente::create(['nome_cli' => 'André Ferreira', 'telefone' => '547991345', 'endereco' => 'nuAvenida da República, 2345 - Bairro Repúblicall', 'cpf' => '06216420546']);
    }
    }

