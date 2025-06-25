<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\foodController;
use App\Http\Controllers\userController;
use App\Http\Controllers\workController;
use App\Http\Controllers\pageController;

// Route::get('/', function () {
//     return date('d');
// });

// Route::get('/', function () {
//     return view('loginDetails');
// });

Route::get('/log', function () {
    return view('index');
});

Route::get('/home', function () {
    if (!session()->has('username')) {
        return "Error";
    }

    return app(pageController::class)->displayHome();
});

// Route::get('/diet', [pageController::class, 'displayDiet']);



Route::get('/diet', function () {

    if (!session()->has('username')) {
        return "Error";
    }

    return app(PageController::class)->displayDiet();
});




Route::match(['get','post'],'/workout', function () {
    if (!session()->has('username')) {
        return "Error";
    }

    return app(workController::class)->displayWorkout();
});



Route::get('/', [userController::class, 'logout']);

Route::get('/discussion', [pageController::class, 'discussion']);

Route::post('/post-content', [pageController::class, 'post']);

Route::get('/reg', function () {
    return view('reg');
});

Route::post('/signup', [userController::class, 'signup']);

Route::post('/login', [userController::class,'login']);

Route::match(['get','post'],'/userdetail',[userController::class,'signUpUser']);

Route::post('/save-foods', [foodController::class,'getFood']);

Route::post('/save-works', [workController::class,'getWork']);

Route::post('/save-worklifting', [workController::class,'workLifting']);

Route::match(['get','post'],'/landing', function () {
    return view('landing');
});
