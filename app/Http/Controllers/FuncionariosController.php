<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\Http\Requests\FuncionarioRequest;


class FuncionariosController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get("desc_filtro");
        if($filtragem == null) {
            $funcionarios = Funcionario::orderBy('nome_fun')->paginate(5);
        } else {
            $funcionarios = Funcionario::where('nome_fun', 'like', '%'.$filtragem.'%')
                          ->orderBy('nome_fun')
                          ->paginate(5)
                          ->setpath('funcionarios?desc_filtro='.$filtragem);
        }

        return view('funcionarios.index', ['funcionarios' => $funcionarios]);
    }


     public function create() {
         return view('funcionarios.create');
     }

     public function store(FuncionarioRequest $request) {
         $novo_funcionario = $request->all();
         $novo_funcionario['telefone'] = str_replace(['(', ')', '-'], '', $novo_funcionario['telefone']);
         Funcionario::create($novo_funcionario);

         return redirect()->route('funcionarios');
     }


     public function destroy(Request $request) {
        try {
            Funcionario::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
        return redirect()->route('funcionarios');
    }

    public function edit(Request $request) {
        $funcionario = Funcionario::find(\Crypt::decrypt($request->get('id')));
        return view('funcionarios.edit', compact('funcionario'));
    }

     public function update(FuncionarioRequest $request, $id) {
         $funcionario = Funcionario::find($id);

         if ($funcionario) {
            $funcionario->telefone = str_replace(['(', ')', '-'], '', $request->input('telefone'));
            // Atribua outros campos atualizados conforme necessário

            $funcionario->save();
        }

         return redirect()->route('funcionarios');
     }







}
