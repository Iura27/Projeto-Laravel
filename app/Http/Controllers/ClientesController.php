<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get("desc_filtro");
        if($filtragem == null) {
            $clientes = Cliente::orderBy('nome_cli')->paginate(5);
        } else {
            $clientes = Cliente::where('nome_cli', 'like', '%'.$filtragem.'%')
                          ->orderBy('nome_cli')
                          ->paginate(5)
                          ->setpath('clientes?desc_filtro='.$filtragem);
        }

        return view('clientes.index', ['clientes' => $clientes]);
    }

     public function create() {
         return view('clientes.create');
     }

     public function store(ClienteRequest $request) {
         $novo_cliente = $request->all();
         $novo_cliente['telefone'] = str_replace(['(', ')', '-'], '', $novo_cliente['telefone']);
         $novo_cliente['cpf'] = str_replace(['.', '-'], '', $novo_cliente['cpf']);
         Cliente::create($novo_cliente);

         return redirect()->route('clientes');
     }


     public function destroy(Request $request) {
        try {
            Cliente::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
        return redirect()->route('clientes');
    }

    public function edit(Request $request) {
        $cliente = Cliente::find(\Crypt::decrypt($request->get('id')));
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id) {
        $cliente = Cliente::find($id);

        if ($cliente) {
            $cliente->telefone = str_replace(['(', ')', '-'], '', $request->input('telefone'));
            $cliente->cpf = str_replace(['.', '-'], '', $request->input('cpf'));
            // Atribua outros campos atualizados conforme necessário

            $cliente->save();
        }

        return redirect()->route('clientes');
    }
}
