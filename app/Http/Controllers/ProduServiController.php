<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\ProdutoServico;
use Illuminate\Support\Facades\Auth;

class ProduServiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtoservicos = ProdutoServico::all();
        return view('produtoservicos', compact('produtoservicos'));
    }

    public function viewCrud()
    {
        $produtoservicos = ProdutoServico::all();
        return view('produtoservicocrud', compact('produtoservicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('produtoservicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();
        $usuario->produtoservicos()->create(
            $request->all()
        );

        return redirect('/produtoservicocrud');
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
        $produtoservicos = ProdutoServico::findOrFail($id);
        return view("/produtoservicocrud/$id/editar", compact('produtoservicos'));
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
        $produtoservicos = ProdutoServico::findOrFail($id);
        $produtoservicos->nome = $request->nome;
        $produtoservicos->descricao = $request->descricao;
        $produtoservicos->preco = $request->preco;
        $produtoservicos->tipo = $request->tipo;
        $produtoservicos->save();

        return redirect('/produtoservicocrud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtoservicos = ProdutoServico::findOrFail($id);
        $produtoservicos->delete();
        return redirect('/produtoservicocrud');
    }

}
