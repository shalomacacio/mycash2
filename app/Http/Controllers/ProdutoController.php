<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

use Session;
use DB;

use App\Model\Compra;
use App\Model\Estoque;
use App\Model\Produto;
use App\Model\Fornecedor;


use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(Produto $produto){
        $this->produto = $produto;
    }

    public function index()
    {
        $marcas = DB::table('marcas')->pluck('nome', 'id');
        $categorias = DB::table('categorias')->pluck('nome','id');
        $fornecedores = Fornecedor::pluck('nome', 'id');
        $contratados = $this->produto->fornecedores()->pluck('nome','id');
        $lista = $this->produto->where('inativo','=',0)->paginate(5);
        return view('produto.index', compact('lista', 'marcas', 'categorias', 'fornecedores', 'contratados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        try {
        $input = $request->all();
        $input['nome'] = strtoupper($request->nome);

        $fornecedores = $input['fornecedores'];
       
        //cria o produto
        $p = $this->produto->create($input);
        
        //associa ao estoque

        //associa aos fornecedores G - A - M - B - I - A - R - R - A
       $p->fornecedores()->attach($fornecedores);


        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('produto');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('produto');
        }
        
    }

    public function search($id) 
    {
      $result = Compra::find($id)->get(['vlr_compra',  'vlr_frete','vlr_tributacao' , 'iof', 'cotacao_dollar', 'qtd_itens']);
      return $result;

      //return Response::json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Produto::where('codigo','=', $codProduto)->get(['codigo', 'nome', 'vlr_venda']);
        $produto = $this->produto->find($id);
        $marcas = DB::table('marcas')->pluck('nome', 'id');
        $categorias = DB::table('categorias')->pluck('nome','id');
        $fornecedores = Fornecedor::pluck('nome', 'id');
        $contratados = $produto->fornecedores()->pluck('nome','id');
        
        return view('produto.edit', compact('produto','marcas', 'categorias', 'fornecedores', 'contratados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação personalizada para ignorar dados UNIQUE.
        //Validator::extend() ...
        try{
       

        $input = $request->all();
        $produto = Produto::findOrFail($id);
        $compra = Compra::findOrFail($input['compra_id']);

        //$produto->update($request->all());
        
        $produto->fill($input)->save();

        //associa a compra 
        $produto->compra()->attach($compra, ['qtd' => $input['quantidade'] ]);
        
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('produto');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('produto');
        }
    }

    public function estoque($id){
        $produto = $this->produto->find($id);
        return view('produto.estoque', compact('produto'));
    }

    public function updateEstoque(Request $request, $id){
         $input = $request->except('_token', '_method');
        //return dd($input);
         $estoque = Estoque::firstOrNew(['produto_id'=>$input['produto_id'], 'qtd'=>$input['quantidade'] , 'vlr_venda'=> $input['vlr_venda']]);
        //return dd($estoque);
         $estoque->save();

         return redirect()->route('produto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}