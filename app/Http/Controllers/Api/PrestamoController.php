<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        return response()->json(Prestamo::with(['usuario', 'libros'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'libros' => 'nullable|array',
            'libros.*' => 'exists:libros,id'
        ]);

        $prestamo = Prestamo::create($request->except('libros'));
        if ($request->has('libros')) {
            $prestamo->libros()->attach($request->input('libros'));
        }
        return response()->json($prestamo->load(['usuario', 'libros']), 201);
    }

    public function show($id)
    {
        $prestamo = Prestamo::with(['usuario', 'libros'])->findOrFail($id);
        return response()->json($prestamo);
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->except('libros'));
        if ($request->has('libros')) {
            $prestamo->libros()->sync($request->input('libros'));
        }
        return response()->json($prestamo->load(['usuario', 'libros']));
    }

    public function destroy($id)
    {
        // the PK of Prestamo is id_prestamos
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->libros()->detach();
        $prestamo->delete();
        return response()->json(null, 204);
    }
}
