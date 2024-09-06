<?php

    namespace App\Http\Controllers\View;


    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use function Laravel\Prompts\password;

    class UserViewController extends Controller
    {
        public function index()
        {
            $users = User::all();

            return view('users.index', compact('users'));
        }

        public function create()
        {
            return view('users.create');
        }

        public function store(Request $request)
        {
            // Validation
            $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'birthday' => 'required|date',
                'gender' => 'required|string|max:1',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'address2' => 'nullable|string|max:255',
                'zipcode' => 'required|string|max:10',
                'town' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = new User([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'birthday' => $request->input('birthday'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'address2' => $request->input('address2'),
                'zipcode' => $request->input('zipcode'),
                'town' => $request->input('town'),
                'country' => $request->input('country'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            $user->save();

            return response()->json(['message' => 'Utilisateur créé avec succès!', 'user' => $user]);
        }

        public function show($id)
        {
            $user = User::findOrFail($id);

            return response()->json($user);
            //return view('users.show', compact('user'));
        }

        public function edit($id)
        {
            $user = User::findOrFail($id);

            return view('users.edit', compact('user'));
        }

        public function update(Request $request, $id): JsonResponse
        {
            // Validation
            $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'birthday' => 'required|date',
                'gender' => 'required|string|max:1',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'address2' => 'nullable|string|max:255',
                'zipcode' => 'required|string|max:10',
                'town' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            $user = User::findOrFail($id);

            $user->name = $request->get('name');
            $user->lastname = $request->get('lastname');
            $user->birthday = $request->get('birthday');
            $user->gender = $request->get('gender');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->address2 = $request->get('address2');
            $user->zipcode = $request->get('zipcode');
            $user->town = $request->get('town');
            $user->country = $request->get('country');
            $user->email = $request->get('email');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->get('password'));
            }

            $user->save();

            return str("Utilisateur mis à jour avec succès.");
        }

        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return str('Utilisateur supprimé avec succès.');
        }
    }
