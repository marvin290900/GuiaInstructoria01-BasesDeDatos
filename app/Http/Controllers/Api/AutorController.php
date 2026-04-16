<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return response()->json(Autor::all());
    }

    public function store(Request $request)
    {
        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return response()->json($autor);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return response()->json($autor);
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        // Suelta la relación M:N antes de morir
        $autor->libros()->detach();

        $autor->delete();
        return response()->json(null, 204);
    }
}
