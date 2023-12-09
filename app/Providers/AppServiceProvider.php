<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Produto;
use \App\TipoTinta;
use \App\Cliente;
use \App\Venda;
use \App\Funcionario;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('Produtos');
            $event->menu->add([
                'text'        => 'Produtos',
                'url'         => 'produtos',
                'icon'        => 'fas fa-fw fa-paint-brush',
                'label'       => Produto::count(),
                'label_color' => 'warning',
            ]);

            $event->menu->add([
                'text'        => 'Tipo de Produtos',
                'url'         => 'tipo_tintas',
                'icon'        => 'fas fa-fw fa-tasks',
                'label'       => TipoTinta::count(),
                'label_color' => 'warning',
            ]);
            $event->menu->add([
                'text'        => 'Clientes',
                'url'         => 'clientes',
                'icon'        => 'fas fa-fw fa-users',
                'label'       => Cliente::count(),
                'label_color' => 'warning',
            ]);
            $event->menu->add([
                'text'        => 'Vendas',
                'url'         => 'vendas',
                'icon'        => 'fas fa-fw fa-handshake',
                'label'       => Venda::count(),
                'label_color' => 'warning',
            ]);

            $event->menu->add([
                'text'        => 'Funcionários',
                'url'         => 'funcionarios',
                'icon'        => 'fas fa-fw fa-user',
                'label'       => Funcionario::count(),
                'label_color' => 'warning',
            ]);


        });


    }
}
