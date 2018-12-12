<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\Categoria;
use DB;


class ProdutoController extends Controller
{
        public function index(Request $request){

        if($request){
         
            $produtos = DB::table('produto')
            ->join('categoria', 'categoria.codigo', '=', 'produto.codigo_categoria')
        
            ->select('produto.*', 'categoria.descricao as categoria')
            ->whereNull('produto.ativo')
            ->paginate(10);
            
            return view('produto.index', ["produtos"  => $produtos]);
        }
    }

    public function create(){

        $categorias = Categoria::where(['ativo' => NULL])->get();
        return view("produto.novo", ["categorias"   => $categorias]);
    }

    //CADASTRAR
    public function store(ProdutoRequest $request){
        $produto = new Produto;
        $produto->descricao  = trim(strtoupper($request->get('descricao')));
        $produto->codigo_categoria  = $request->get('categoria');
        $produto->quantidade  = trim(strtoupper($request->get('quantidade')));
        $produto->save();
        return Redirect::to('/produtos')->with('cad', 'Cadastrado com sucesso');
        
       
    }
    //VISUZALIAR EM PAGINA 
    public function show($id){
        return view("produto.show", ["produto"=>Produto::findOrFail($id)]);
    }
    //EDITAR
    public function edit($id){
        $produto = Produto::where('codigo', '=', $id)->whereNull('ativo')->firstOrFail();
        $categorias = DB::table('categoria')->get();
        return view("produto.editar", 
            ["produto"		 => $produto, 
             "categorias" 	 => $categorias
        	]);
    }
    //UPDATE
    public function update(ProdutoRequest $request, $id){
        

        $produto=Produto::findOrFail($id);

        $produto->descricao  = trim(strtoupper($request->get('descricao')));
        $produto->codigo_categoria  = $request->get('categoria');
        $produto->quantidade  = trim(strtoupper($request->get('quantidade')));
        $produto->update();
        return Redirect::to('/produtos')->with('up', 'Alterado com sucesso');
    }
    //DELETAR
    public function destroy($id){

        $produto =Produto::findOrFail($id);
        $produto->ativo ='N';
        $produto->update();
       

        return Redirect::to('/produtos')->with('del', $produto->descricao.' foi removido com sucesso');
    }

}
