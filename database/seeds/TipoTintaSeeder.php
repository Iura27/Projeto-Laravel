<?php

use Illuminate\Database\Seeder;
use App\TipoTinta;

class TipoTintaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoTinta::create(['descricao' => 'Látex PVA']);
        TipoTinta::create(['descricao' => 'Tinta Acrílica']);
        TipoTinta::create(['descricao' => 'Tinta Laváve']);
        TipoTinta::create(['descricao' => 'Tinta Epóxi']);
        TipoTinta::create(['descricao' => 'Tinta Inodora']);
        TipoTinta::create(['descricao' => 'Esmalte Sintético']);
        TipoTinta::create(['descricao' => 'Produtos para pintar']);
    }
}
