<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/our-team', function () {
    return view('our-team');
});

Route::get('/events', function () {
    return view('events');
});