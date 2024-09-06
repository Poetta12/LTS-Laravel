<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthController extends Controller
    {
        public function doLogin(Request $request)
        {
            try {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    $token = $user->createToken('Personal Access Token')->plainTextToken;

                    // Set the token in the response header instead of a cookie
                    return response()->json([
                        'message' => 'Connexion réussie!',
                        'token' => $token,
                        'user' => $user,
                    ], 200);
                }

                return response()->json([
                    'message' => 'Les informations de connexion ne sont pas correctes.'
                ], 401);

            } catch (\Exception $e) {
                \Log::error('Login error: ' . $e->getMessage());

                return response()->json([
                    'message' => 'Une erreur est survenue.',
                ], 500);
            }
        }

        public function logout(Request $request)
        {
            \Log::info('Début de la déconnexion');
            if ($user = $request->user()) {
                \Log::info('Utilisateur trouvé: ' . $user->id);
                try {
                    $user->tokens()->delete(); // Deleting tokens
                    \Log::info('Token deleted');
                } catch (\Exception $e) {
                    \Log::error('Erreur lors de la suppression du token: ' . $e->getMessage());
                    return response()->json(['message' => 'Erreur lors de la déconnexion.'], 500);
                }
            } else {
                \Log::info('Aucun utilisateur trouvé');
            }

            return response()->json(['message' => 'Déconnexion réussie.']);
        }
    }
