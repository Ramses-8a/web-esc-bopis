<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserMovil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserMovilController extends Controller
{
    public function index()
    {
        return UserMovil::all();
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:user_movil|max:255',
                'password' => 'required|string|min:8',
                'password_confirm' => 'required|string|min:8|same:password',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors(),
            ], 422);
        }

        unset($validatedData['password_confirm']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = Hash::make($validatedData['email']);
        $validatedData['estatus'] = 1; // Valor por defecto
        $validatedData['fk_tipo_usuario'] = 1; // Valor por defecto

        $userMovil = UserMovil::create($validatedData);
        return response()->json($userMovil, 201);
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors(),
            ], 422);
        }

        $user = UserMovil::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas.'
            ], 401);
        }

        $user->remember_token = Hash::make($user->email . time()); // Generar un nuevo remember_token
        $user->save();

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     */
}
