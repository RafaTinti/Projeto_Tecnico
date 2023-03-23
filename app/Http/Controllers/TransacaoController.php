<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //faz o saldo entre debitos e creditos
        $credCategorias = Categoria::where("excluido", false)->where("tipo", "credito")->get();
        $creditos = Transacao::where("excluido", false)->whereBelongsTo($credCategorias)->sum("valor");

        $debCategorias = Categoria::where("excluido", false)->where("tipo","debito")->get();
        $debitos = Transacao::where("excluido", false)->whereBelongsTo($debCategorias)->sum("valor");
        $saldo = $creditos - $debitos;


        return view("Transacao.index", [
            "transacoes" => Transacao::where("excluido", false)->paginate(10), // gets all pessoas
            "saldo" => $saldo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Transacao.create", [
            "pessoas" => Pessoa::where("excluido", false)->get(),
            "categorias" => Categoria::where("excluido", false)->get(),
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
            "pessoa_id" => $request->pessoa_id, // nao precisa validar como vem do DB
            "categoria_id" => $request->categoria_id, // mesmo
            "descricao" => $request->descricao,
            "status" => $request->status, // nao precisa validar pq e de escolher
            "valor" => $request->valor*100, //validar que tem so ate duas casas decimais
            "vencimento" => $request->vencimento,
            "liquidada" => $request->liquidada,//vem nulo se status e pendente
            "excluido" => false,
        ])->users()->attach(Auth::id(), ["tipo" => "created"]);

        return redirect(route("Transacao.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id, )
    {
        $transacao = Transacao::where("excluido", false)->findOrFail($id);

        return view("Transacao.show", [
            "transacao" => $transacao,
            "criador" => $transacao->users->first(),
            "modificador" => $transacao->users->last(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("Transacao.edit", [
            "transacao" => Transacao::where("excluido", false)->findOrFail($id),
            "pessoas" => Pessoa::where("excluido", false)->get(),
            "categorias" => Categoria::where("excluido", false)->get(),
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
            "pessoa_id" => $request->pessoa_id, // nao precisa validar como vem do DB
            "categoria_id" => $request->categoria_id, // mesmo
            "descricao" => $request->descricao,
            "status" => $request->status, // nao precisa validar pq e de escolher
            "valor" => $request->valor*100, //validar que tem so ate duas casas decimais
            "vencimento" => $request->vencimento,
            "liquidada" => $request->liquidada,//vem nulo se status e pendente
        ]);

        Transacao::find($id)->users()->attach(Auth::id(), ["tipo" => "updated"]);

        return redirect(route("Transacao.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transacao::where("id", $id)->update([ //exclusao logica
            "excluido" => true,
        ]);
        Transacao::find($id)->users()->attach(Auth::id(), ["tipo" => "deleted"]); 

        return redirect(route("Transacao.index"))->with("message","Excluido com sucesso");
    }
}
