<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pessoas = Pessoa::orderBy("updated_at", "desc")->get(); // other option
        // dd($pessoas);
        return view("Pessoas.index", [
            "pessoas" => Pessoa::paginate(10), // gets all pessoas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Pessoas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'fis_ou_jur' => 'required|',

            // se e pessoa fisica cpf e required unico e segue o padrao se e juridica sem verificacao pq e nullado na hora de salvar
            'cpf' => ($request->fis_ou_jur === "fisica")? 'required|unique:pessoas|regex:([0-9]{3}[\.][0-9]{3}[\.][0-9]{3}[-][0-9]{2})' : '',
            //similar para o cnpj
            'cnpj' => ($request->fis_ou_jur === "juridica")? 'required|unique:pessoas|regex:([0-9]{2}[\.][0-9]{3}[\.][0-9]{3}[\/][0-9]{4}[-][0-9]{2})': '',

            'cidade' => 'required',
            'estado' => 'required|regex:([A-Z]{2})', // verifica se sao duas letras maiusculas
            'contato' => 'required|regex:(\([0-9]{2}\)[ ][0-9]{5}[-][0-9]{4})', 
            'email' => 'required|unique:pessoas|email',
        ]);

        Pessoa::create([
            'nome' => $request->nome,
            'fis_ou_jur' => $request->fis_ou_jur,
            'cpf' => ($request->fis_ou_jur === "fisica")? $request->cpf : null,
            'cnpj' => ($request->fis_ou_jur === "fisica")? null : $request->cnpj,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'contato' => $request->contato,
            'email' => $request->email,
            'ativo' => true, // pessoas sao sempre ativas quando cadastradas
            'user_id' => $request->user()->id, // cadastros sao associados ao usuario que o criou
        ]);
        return redirect(route("Pessoas.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("Pessoas.show", [
            "pessoa" => Pessoa::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("Pessoas.edit", [
            "pessoa" => Pessoa::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'fis_ou_jur' => 'required|',

            // se e pessoa fisica cpf e required unico e segue o padrao se e juridica sem verificacao pq e nullado na hora de salvar
            'cpf' => ($request->fis_ou_jur === "fisica")? 'required|regex:([0-9]{3}[\.][0-9]{3}[\.][0-9]{3}[-][0-9]{2})|unique:pessoas,cpf,' . $id : '',
            //similar para o cnpj
            'cnpj' => ($request->fis_ou_jur === "juridica")? 'required|regex:([0-9]{2}[\.][0-9]{3}[\.][0-9]{3}[\/][0-9]{4}[-][0-9]{2})|unique:pessoas,cnpj,' . $id: '',
            'cidade' => 'required',
            'estado' => 'required|regex:([A-Z]{2})', // verifica se sao duas letras maiusculas
            'contato' => 'required|regex:(\([0-9]{2}\)[ ][0-9]{5}[-][0-9]{4})', 
            'email' => 'required||email|unique:pessoas,email,' . $id,
        ]);
        Pessoa::where("id", $id)->update([
            'nome' => $request->nome,
            'fis_ou_jur' => $request->fis_ou_jur,
            'cpf' => ($request->fis_ou_jur === "fisica")? $request->cpf : null,
            'cnpj' => ($request->fis_ou_jur === "fisica")? null : $request->cnpj,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'contato' => $request->contato,
            'email' => $request->email,
            'ativo' => ($request->ativo)? true : false, // pessoas sao sempre ativas quando cadastradas
            'user_id' => $request->user()->id, // atualiza que usuario modificou
        ]);
        return redirect(route("Pessoas.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect(route("Pessoas.index"))->with("message","Excluido com sucesso");
    }
}
