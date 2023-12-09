<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTinta;
use App\Http\Requests\TipoTintaRequest;

class TipoTintasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get("desc_filtro");
        if($filtragem == null) {
            $tipo_tintas = TipoTinta::orderBy("descricao")->paginate(5);
        }
        else {
            $tipo_tintas = TipoTinta::where("descricao", "like", "%".$filtragem."%")
                ->orderBy("descricao")
                ->paginate(5)
                ->setpath("tipo_tintas?desc_filtro=".$filtragem);
        }
        return view('tipo_tintas.index', ['tipo_tintas' => $tipo_tintas]);
    }

     public function create() {
         return view('tipo_tintas.create');
     }

     public function store(TipoTintaRequest $request) {
         $novo_tipo_tinta = $request->all();
         TipoTinta::create($novo_tipo_tinta);

         return redirect()->route('tipo_tintas');
     }

     public function destroy(Request $request) {
        try {
            TipoTinta::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
        //return redirect()->route('tipo_tintas');
    }

     public function edit(Request $request) {
        $tipo_tinta = TipoTinta::find(\Crypt::decrypt($request->get('id')));
        return view('tipo_tintas.edit', compact('tipo_tinta'));
     }

     public function update(TipoTintaRequest $request, $id) {
         TipoTinta::find($id)->update($request->all());
         return redirect()->route('tipo_tintas');
     }
}
