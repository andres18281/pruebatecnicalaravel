<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, generar token de acceso
            $user = Auth::user();
            $token = $user->createToken('TokenName')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        // Autenticación fallida
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
