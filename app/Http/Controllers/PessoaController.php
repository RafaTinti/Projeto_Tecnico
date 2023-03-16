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
            "pessoas" => Pessoa::get(), // gets all pessoas
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
        dd($request->all);
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
    public function edit(Pessoa $pessoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
