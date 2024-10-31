<?php

use App\Http\Controllers\FormControllers; 
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::resource('users', FormControllers::class);

//Rota p/ atualização de senha:
Route::get('/users/{id}/editpass', [FormControllers::class, 'editpass'])->name('users.editpass');
Route::patch('/users/{id}/updatepass',[FormControllers::class, 'updatepass'])->name('users.updatepass');





/*
Exemplos com função ao invés do Controller:
1. Route::get('/users/delete', function () {
    return view('delete');
});

2. Route::get('/users/{id}', function ($id) {
   $user = User::find($id);
   
   return view('users.show', ['user'=> $user]);
});

Exemplo de route sem o resource:
Route::get('/users', [FormControllers::class, 'index'])->name('index');

*/




