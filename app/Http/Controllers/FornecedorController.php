<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;
use DB;

use App\Model\Fornecedor;
use App\Http\Requests\FornecedorRequest;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Fornecedor $fornecedor){
        $this->fornecedor = $fornecedor;
    }


    public function index()
    {
        $lista = $this->fornecedor->paginate(5);
        return view('fornecedor.index', compact('lista'));
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
    public function store(FornecedorRequest $request)
    {

        try {

        $input = $request->all();
        $input['nome'] = strtoupper($request->nome);
      
        $this->fornecedor->create($input);
        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('fornecedor');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('fornecedor');
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
        $total = $this->fornecedor->all();
        $fornecedor = $this->fornecedor->find($id);
        return view('fornecedor.edit', compact('fornecedor','total'));
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
        $fornecedor = $this->fornecedor->find($id)->update($request->all());
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('fornecedor');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('fornecedor');
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
