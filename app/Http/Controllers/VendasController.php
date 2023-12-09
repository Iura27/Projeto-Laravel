<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaRequest;
use Illuminate\Http\Request;
use App\Venda;
use App\ProdutoVendido;
use App\Produto;
use App\Cliente;
use App\Funcionario;
use Illuminate\Support\Facades\DB;




class VendasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $filtro) {
        $filtragem = $filtro->get("desc_filtro");

        $vendas = Venda::query()
            ->with(['cliente', 'funcionario'])
            ->when($filtragem, function ($query, $filtragem) {
                $query->where('descricao', 'like', '%' . $filtragem . '%');
            })
            ->select('vendas.*')
            ->orderBy('descricao')
            ->paginate(5);

        return view('vendas.index', ['vendas' => $vendas]);
    }








    public function create() {
        return view('vendas.create');
    }



    public function store(Request $request) {

        $produtos = $request->get('produtos');
        if (!empty($produtos)) {
            $vendas = Venda::create([
                'descricao' => $request->get('descricao'),
                'dt_compra' => $request->get('dt_compra'),
                'cliente_id' => $request->get('cliente_id'),
                'funcionario_id' => $request->get('funcionario_id')
            ]);

            $produtos = $request->get('produtos');
            if (!empty($produtos)) {
                foreach ($produtos as $produtoId) {
                    $produtoVendido = new ProdutoVendido();
                    $produtoVendido->venda_id = $vendas->id;
                    $produtoVendido->produto_id = $produtoId;
                    $produtoVendido->save();
                }
            }
        }
        return redirect()->route('vendas');
}










public function destroy(Request $request) {
    try {
        $venda = Venda::findOrFail(\Crypt::decrypt($request->get('id')));

        DB::beginTransaction();  // Corrigir a forma de exclusão no banco daqui nas próximas 2 linhas

        // Excluir os registros relacionados na tabela venda_veiculos
        $venda->produtosVendidos()->delete();

        // Excluir a venda em si
        $venda->delete();

        DB::commit();

        $ret = array('status' => 200, 'msg' => "Venda excluída com sucesso");
    } catch (\Illuminate\Database\QueryException $e) {
        DB::rollback();
        $ret = array('status' => 500, 'msg' => $e->getMessage());
    } catch (\PDOException $e) {
        DB::rollback();
        $ret = array('status' => 500, 'msg' => $e->getMessage());
    }
    return $ret;
}




    public function edit(Request $request) {
        $venda = Venda::find(\Crypt::decrypt($request->get('id')));
        return view('vendas.edit', compact('venda'));
    }

    public function update(VendaRequest $request, $id){
        $venda = Venda::findOrFail($id);
        $venda->update($request->except('produtos'));

        $produtos = $request->input('produtos', []); // Veículos selecionados
        $venda->produtos()->sync($produtos); // Sincroniza os veículos relacionados à venda

        return redirect()->route('vendas');
    }



}
