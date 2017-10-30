<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;
use DB;

use App\Model\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }

    public function index()
    {
        $lista = $this->categoria->paginate(5);
        return view('categoria.index', compact('lista'));
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
    public function store(CategoriaRequest $request)
    {

        try {

        $input = $request->all();
        $input['nome'] = strtoupper($request->nome);
      
        $this->categoria->create($input);
        Session::flash('flash_success', 'salvo com sucesso');
        return redirect()->route('categoria');
        } catch (Exception $e) {
            Session::flash('flash_danger', 'Erro' . $e);
            return redirect()->route('categoria');
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
        $total = $this->categoria->all();
        $categoria = $this->categoria->find($id);
        return view('categoria.edit', compact('categoria','total'));
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
        $categoria = Categoria::find($id)->update($request->all());
        Session::flash('flash_success', 'alterado com sucesso');
        return redirect()->route('categoria');
         } catch (Exception $e) {
        Session::flash('flash_danger', 'Erro' . $e);
        return redirect()->route('categoria');
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
