<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Model\Compra;
use Session;
use Carbon\Carbon;
use DB;


//use App\Http\Requests\ProdutoRequest;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
 public function __construct(Compra $compra){
        $this->compra = $compra;
    }

    public function index()
    {
        $lista = $this->compra->paginate(5);
        return view('compra.index', compact('lista'));
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
       
        //cria o compra
        $this->compra->create($input);


        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('compra');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('compra');
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
        $c = $this->compra::find($id);
        return view( 'compra.show', compact('c') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = $this->compra->find($id);  
        $dataCompra = Carbon::parse($compra->data_compra)->format('Y-m-d');  
        return view('compra.edit', compact('compra', 'dataCompra'));
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
        $compra = Compra::findOrFail($id);

        $input = $request->all();

        //$compra->update($request->all());
       $compra->fill($input)->save();
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('compra');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('compra');
        }
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
