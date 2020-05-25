<?php

namespace App\Http\Controllers;

use App\Model\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Produtos::all();

        return View::make('home.produtos', compact('data'));
        // $data = Produtos::all();
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('home.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = New Produtos();
        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->foto = $request->foto;
        $produto->preco = $request->preco;
        $produto->save();

        return redirect(route('produtos.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produtos::find($id);
        return View::make('home.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produtos::find($id);
        return View::make('home.editar', compact('produto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $produto = Produtos::find($id);
        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->foto = $request->foto;
        $produto->preco = $request->preco;
        $produto->save();
        return redirect()->route('produtos.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $produtos = Produtos::find($id);
        $produtos->delete();
        return redirect()->route('produtos.index');
    }
}
