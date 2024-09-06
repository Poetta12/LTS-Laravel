<?php

    namespace App\Http\Controllers\View;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthViewController extends Controller
    {
        public function doLogin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('Personal Access Token')->plainTextToken;

                // Créer un cookie avec le token
                $cookie = cookie('auth_token', $token, 60 * 24, '/', null, true, true, false, 'Strict');

            return response()->json([
                'message' => 'Connexion réussie!',
                'token' => $token,
                'user' => $user,
            ], 200)->withCookie($cookie);
        }

            return response()->json([
                'message' => 'Les informations de connexion ne sont pas correctes.'
            ], 401);
        }

        public function logout(Request $request)
        {
            $request->user()->tokens()->delete();

            // Effacer le cookie
            $cookie = \Cookie::forget('auth_token');

            return response()->json([
                'message' => 'Déconnexion réussie!'
            ], 200)->withCookie($cookie);
        }
    }
