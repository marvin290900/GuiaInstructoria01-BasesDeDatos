<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:Usuarios',
            'telefono' => 'required|string|max:255',
        ]);
        
        // Auto-assign a default password so the user doesn't need to specify it for testing
        $data['password'] = bcrypt('password');

        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'nombre'   => 'sometimes|required|string|max:255',
            'email'    => 'sometimes|required|string|email|max:255|unique:Usuarios,email,'.$user->id,
            'telefono' => 'sometimes|required|string|max:255',
        ]);

        $user->update($data);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
