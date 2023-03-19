<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
