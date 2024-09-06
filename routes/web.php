<?php

    use App\Http\Controllers\View\AuthViewController;
    use App\Http\Controllers\View\CategoryViewController;
    use App\Http\Controllers\View\ProductViewController;
    use App\Http\Controllers\View\UserViewController;
    use Illuminate\Support\Facades\Route;


// Routes pour le login
Route::get('login', [AuthViewController::class, 'login']);
Route::post('login', [AuthViewController::class, 'doLogin']);
Route::post('logout', [AuthViewController::class, 'logout']);


// Route pour la vue d'accueil
    Route::get('/', function () {
        return view('welcome');
    });

// Vous pouvez aussi avoir une route pour une page de connexion Web, mais assurez-vous qu'elle ne se confond pas avec les routes API
    Route::get('/login', function () {
        return view('auth.login'); // Page de connexion pour le front-end (si nécessaire)
    });


// Routes pour les users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserViewController::class, 'index'])->name('users.index');
        Route::get('/create', [UserViewController::class, 'create'])->name('users.create');
        Route::get('/{user}/edit', [UserViewController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserViewController::class, 'update'])->name('users.update');
        Route::post('/', [UserViewController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserViewController::class, 'show'])->name('users.show');
        Route::delete('/{user}', [UserViewController::class, 'destroy'])->name('users.destroy');
    });

    //->Middleware('auth:sanctum')


// Routes pour les products
    route::prefix('/products')->group(function () {
        Route::get('/', [ProductViewController::class, 'index']);
        Route::get('/{id}', [ProductViewController::class, 'ShowProduits']);
        Route::post('/', [ProductViewController::class, 'products']);
        Route::put('/{id}', [ProductViewController::class, 'update']);
        Route::delete('/{id}', [ProductViewController::class, 'destroy']);
    });

// Routes pour les catégories
    Route::prefix('/categorie')->group(function () {
        Route::get('/', [CategoryViewController::class, 'index']);
        Route::get('/{id}', [CategoryViewController::class, 'showCategorie']);
        Route::post('/', [CategoryViewController::class, 'create']);
        Route::put('/{id}', [CategoryViewController::class, 'update']);
        Route::delete('/{id}', [CategoryViewController::class, 'delete']);
    });

    Route::get('/login', [AuthViewController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthViewController::class, 'doLogin']);

