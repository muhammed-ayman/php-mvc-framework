<?php

    use Psi\Http\Route;
    use App\Controllers\HomeController;
    
    Route::get('/{name}/{echo}', function($params = []) {
        
    });

    Route::get('/', [HomeController::class, 'index']);