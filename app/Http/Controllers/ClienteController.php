<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;
use DB;

use App\Model\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }


    public function index()
    {
        $lista = $this->cliente->paginate(5);
        return view('cliente.index', compact('lista'));
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
        $input['nome'] = strtoupper($request->nome);
      
        $this->cliente->create($input);
        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('cliente');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('cliente');
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
        $total = $this->cliente->all();
        $cliente = $this->cliente->find($id);
        return view('cliente.edit', compact('cliente','total'));
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
        $cliente = $this->cliente->find($id)->update($request->all());
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('cliente');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('cliente');
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
