<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        
        try {
            $categoria->delete();
            return response()->json(null, 204);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") { // Integrity constraint violation
                return response()->json([
                    'error' => 'No se puede eliminar la categoría porque hay libros asignados a ella.'
                ], 409); // 409 Conflict
            }
            throw $e;
        }
    }
}
