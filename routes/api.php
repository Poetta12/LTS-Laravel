<?php

    use App\Http\Controllers\Api\PCartController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\AuthController;
    use App\Http\Controllers\Api\ProductController;
    use App\Http\Controllers\Api\UserController;
    use App\Http\Controllers\Api\CartController;
    use App\Http\Controllers\Api\CategoryController;
    use App\Http\Controllers\Api\OrderController;

// Routes publiques (avant connexion)
    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
    Route::post('/users', [UserController::class, 'store']);


// Routes protégées (après connexion)
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cart-items')->group(function () {
            Route::post('/', [PCartController::class, 'store']);
        });

        Route::prefix('carts')->group(function () {
            Route::get('/', [CartController::class, 'index']);
            Route::get('/{id}', [CartController::class, 'show']);
            Route::post('/', [CartController::class, 'store']);
            Route::put('/{id}', [CartController::class, 'update']);
            Route::delete('/{id}', [CartController::class, 'destroy']);
            Route::post('/add-product', [CartController::class, 'addProductToCart']);
            Route::get('/items', [CartController::class, 'getCartItems']); // Ajoutez cette ligne
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/create', [UserController::class, 'create']);
            Route::get('/{user}/edit', [UserController::class, 'edit']);
            Route::put('/{user}', [UserController::class, 'update']);
            Route::get('/{user}', [UserController::class, 'show']);
            Route::delete('/{user}', [UserController::class, 'destroy']);
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/{id}', [ProductController::class, 'showProduits']);
            Route::post('/', [ProductController::class, 'store']);
            Route::put('/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/{id}', [CategoryController::class, 'show']);
            Route::post('/', [CategoryController::class, 'store']);
            Route::put('/{id}', [CategoryController::class, 'update']);
            Route::delete('/{id}', [CategoryController::class, 'destroy']);
        });

        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index']);
            Route::get('/{id}', [OrderController::class, 'show']);
            Route::post('/', [OrderController::class, 'store']);
            Route::put('/{id}', [OrderController::class, 'update']);
            Route::delete('/{id}', [OrderController::class, 'destroy']);
        });

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
