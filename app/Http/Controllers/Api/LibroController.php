<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return response()->json(Libro::with(['categoria', 'autores'])->get());
    }

    public function store(Request $request)
    {
        $libro = Libro::create($request->except('autores'));
        if ($request->has('autores')) {
            $libro->autores()->attach($request->input('autores'));
        }
        return response()->json($libro->load(['categoria', 'autores']), 201);
    }

    public function show($id)
    {
        $libro = Libro::with(['categoria', 'autores'])->findOrFail($id);
        return response()->json($libro);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->except('autores'));
        if ($request->has('autores')) {
            $libro->autores()->sync($request->input('autores'));
        }
        return response()->json($libro->load(['categoria', 'autores']));
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        // Suelta las relaciones M:N antes de morir
        $libro->autores()->detach();
        $libro->prestamos()->detach();
        
        $libro->delete();
        return response()->json(null, 204);
    }
}
