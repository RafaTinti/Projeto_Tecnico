<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Categorias.index", [
            "categorias" => Categoria::where("excluido", false)->paginate(10), // pagina todas as pessoas nao excluidas
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
            'excluido' => false,
        ])->users()->attach(Auth::id(), ["tipo" => "created"]);
        return redirect(route("Categorias.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::where("excluido", false)->findOrFail($id);

        return view("Categorias.show", [
            "categoria" => Categoria::findOrFail($id),
            "criador" => $categoria->users->first(),// primeiro e sempre quem criou
            "modificador" => $categoria->users->last(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("Categorias.edit", [
            "categoria" => Categoria::where("excluido", false)->findOrFail($id),
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
        ]);

        Categoria::find($id)->users()->attach(Auth::id(), ["tipo" => "updated"]);

        return redirect(route("Categorias.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Categoria::where("id", $id)->update([
            "excluido" => true,
        ]);
        Categoria::find($id)->users()->attach(Auth::id(), ["tipo" => "deleted"]);

        return redirect(route("Categorias.index"))->with("message","Excluido com sucesso");
    }
}
