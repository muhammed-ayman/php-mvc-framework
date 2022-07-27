<?php

    use Psi\Http\Route;
    use Psi\View\View;
    
    Route::get('/', function() {
        View::create('hello');
    });