<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
use \Illuminate\Support\Facades\Blade;

Route::get('/',[ProductController::class,('mainView')] )->name('/');
Route::get('register',[UserController::class,('registerView')])->name('register');
Route::post('register',[UserController::class,('regi')]);
Route::get('auth',[UserController::class,('authView')])->name('auth');
Route::post('auth',[UserController::class,('auth')]);

Route::get('Exit',[UserController::class,'Exit'])->name('Exit');
Route::get('addproduct',[ProductController::class,('addproductView')])->name('addproduct')->middleware('admin');
Route::post('addproduct',[ProductController::class,('addproduct')]);

Route::get('/buy/product/{product}',[ProductController::class,('buyProductView')])->name('buyProduct')->middleware('ver');
Route::post('/buy/product/{product}',[ProductController::class,('buyProduct')]);


Route::get('/product/delete',[ProductController::class,('deleteProductView')])->name('deleteProduct')->middleware('ver');
Route::get('/product/order',[ProductController::class,('orderView')])->name('orderProduct')->middleware('admin');

Route::get('/product/delete/{delevery}',[ProductController::class,('deleteView')])->middleware('ver');
Route::post('/product/delete/{delevery}',[ProductController::class,('delete')]);

Route::get('/product/update/{product}',[ProductController::class,('updateView')])->middleware('admin');
Route::post('/product/update/{product}',[ProductController::class,('update')]);

Route::get('/product/view/{users}',[ProductController::class,('viewView')])->name('view')->middleware('ver');
Route::post('/product/view/{users}',[ProductController::class,('view')]);

