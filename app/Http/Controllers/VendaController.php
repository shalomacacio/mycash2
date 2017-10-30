<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Session;
use DB;

use App\Model\Venda;
use App\Model\Cliente;
use App\Model\Produto;
use App\Model\Pedido;
use App\User;
//use App\Http\Requests\VendaRequest;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(Venda $venda, Pedido $pedido){
        $this->venda = $venda;
        $this->pedido = $pedido;
    }

    public function index()
    {
        $lista = $this->venda->paginate(5);
        $clientes = Cliente::all()->pluck('nome', 'id');
        $usuarios = User::all()->pluck('name','id');
        return view('venda.index', compact('lista', 'clientes', 'usuarios'));
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
    public function store(Request $request)
    {
        try {

        $input = $request->all();
        return dd($input);

        $p = Produto::find($input['produto_id']);
        //return dd($p);

        $v = $this->venda->create($input);
        $v->produtos()->attach($p,['qtd' => $input['qtd'] , 'subtotal' => $input['subtotal']] );

        Session::flash('flash_success', 'salvo com sucesso');



        return redirect()->route('venda');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('venda');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $v = Venda::find($id);
        //return dd($v->produtos);
       return view('venda.show', compact('v'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $total = $this->venda->all();
        $venda = $this->venda->find($id);
        return view('venda.edit', compact('venda','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendaRequest $request, $id)
    {
        try{
        $venda = $this->venda->find($id)->update($request->all());
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('venda');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('venda');
        }
    }

    /**tela de pdv 
    **/
   public function pdv(){
    return view('venda.pdv');
   }

   public function search($request) { 
    $input = $request;

    $encontrados = DB::table('produtos')
                            ->where('codigo', $input )
                            ->orWhere('nome', 'LIKE', '%'.$input.'%')
                            ->orWhere('descricao', 'LIKE', '%'.$input.'%')
                            ->get([ 'id' ,'codigo', 'nome', 'vlr_venda', 'descricao']);
     return Response::json($encontrados);
   }

   public function addItem(Request $request){

        $input = $request->all();
        return dd($input);
        $p = $this->pedido->create($input);

        /*
        DB::table('temporary_venda')->insert(['cod_venda' => $input['cod_venda'] , 'cod_produto'=>  $input['cod'], 'qtd'=>  $input['qua'], 'vlr_venda'=>  $input['ven'], 'subtotal'=>  $input['sub'] ]);
        */
        $itensVenda = Pedido::where('cod_venda', $input['cod_venda']);

        return view('venda.pdv', compact('itensVenda')); 
    }

    public function removeItem($id){

        $iten = DB::table('temporary_venda')->find($id);

        return dd($iten['cod_venda']);

       DB::table('temporary_venda')
            ->where('id',$id)    
            ->delete();

        $itensVenda = DB::table('temporary_venda')
            ->where('cod_venda', $v)->get();

        return view('venda.pdv', compact('itensVenda')); 
        
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
