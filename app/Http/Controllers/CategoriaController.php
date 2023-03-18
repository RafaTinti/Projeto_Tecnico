<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Categorias.index", [
            "categorias" => Categoria::paginate(10), // gets all pessoas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|max:255'
        ]);

        Categoria::create([
            "categoria" => $request->categoria,
            "tipo" => $request->tipo,
            "user_id" => $request->user()->id,
        ]);
        return redirect(route("Categorias.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("Categorias.show", [
            "categoria" => Categoria::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("Categorias.edit", [
            "categoria" => Categoria::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required|max:255'
        ]);

        Categoria::where("id", $id)->update([
            "categoria" => $request->categoria,
            "tipo" => $request->tipo,
            "user_id" => $request->user()->id,
        ]);

        return redirect(route("Categorias.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect(route("Categorias.index"))->with("message","Excluido com sucesso");
    }
}
