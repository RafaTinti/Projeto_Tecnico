<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Transacao.index", [
            "transacoes" => Transacao::paginate(10), // gets all pessoas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Transacao.create", [
            "pessoas" => Pessoa::get(),
            "categorias" => Categoria::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "descricao" => "required|max:255",
            "valor" => ["required","numeric","regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/"] // valida se tem no max 2 casas decimais
        ]);

        Transacao::create([
            "user_id" => $request->user()->id,
            "pessoa_id" => $request->pessoa_id, // nao precisa validar como vem do DB
            "categoria_id" => $request->categoria_id, // mesmo
            "descricao" => $request->descricao,
            "status" => $request->status, // nao precisa validar pq e de escolher
            "valor" => $request->valor*100, //validar que tem so ate duas casas decimais
            "vencimento" => $request->vencimento,
            "liquidada" => $request->liquidada,//vem nulo se status e pendente
        ]);

        return redirect(route("Transacao.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("Transacao.show", [
            "transacao" => Transacao::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("Transacao.edit", [
            "transacao" => Transacao::findOrFail($id),
            "pessoas" => Pessoa::get(),
            "categorias" => Categoria::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "descricao" => "required|max:255",
            "valor" => ["required","numeric","regex:/^(?:[1-9]\d+|\d)(?:\.\d\d)?$/"] // valida se tem no max 2 casas decimais
        ]);

        Transacao::where("id", $id)->update([
            "user_id" => $request->user()->id,
            "pessoa_id" => $request->pessoa_id, // nao precisa validar como vem do DB
            "categoria_id" => $request->categoria_id, // mesmo
            "descricao" => $request->descricao,
            "status" => $request->status, // nao precisa validar pq e de escolher
            "valor" => $request->valor*100, //validar que tem so ate duas casas decimais
            "vencimento" => $request->vencimento,
            "liquidada" => $request->liquidada,//vem nulo se status e pendente
        ]);

        return redirect(route("Transacao.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transacao::destroy($id);
        return redirect(route("Transacao.index"))->with("message","Excluido com sucesso");
    }
}
