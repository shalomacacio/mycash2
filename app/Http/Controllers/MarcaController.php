<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;
use DB;

use App\Model\Marca;
use App\Http\Requests\MarcaRequest;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Construtor
    public function __construct(Marca $marca){
        $this->marca = $marca;
    }

    public function index()
    {
        $lista = $this->marca->paginate(5);
        return view('marca.index', compact('total', 'lista'));
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
    public function store(MarcaRequest $request)
    {

        try {

        $input = $request->all();
        $input['nome'] = strtoupper($request->nome);
      
        Marca::create($input);
        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('marca');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('marca');
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
        $total = $this->marca->all();
        $marca = $this->marca->find($id);
        return view('marca.edit', compact('marca','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcaRequest $request, $id)
    {
     
        // Validação personalizada para ignorar dados UNIQUE.
        //Validator::extend() ...
        try{
        $marca = Marca::find($id)->update($request->all());
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('marca');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('marca');
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
