<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// rota sem parâmetro
Route::get('/hello', function () {
   return 'Hello World!'; 
});
// rota com parâmetro
Route::get('/saudacoes/{nome}', function ($nome) {
    return 'Olá ' . $nome;
});

// rota com parâmetro opcional, usa ? no parâmetro opcional
Route::get('/multiplicacao/{numero1}/{numero2?}', function ($numero1, $numero2 = null) {
    if ($numero2 != null) {
        echo $numero1 * $numero2;
    } else {
        echo 'Faltou o segundo número';
    }
});
// rota que direciona para view
Route::get('/view', function (){
    return view('minhaPrimeira');
});

Route::get('/view-parametro/{nome}', function ($nome) {
   return view('minhaSegunda')->with('nomeBlade', $nome); 
});

Route::get('/posso-entrar/{idade}', function ($idade){
    if ($idade >= 18) {
        return view('PossoEntrar')->with('mensagem', 'Bem vindo!');
    } else {
        return view('PossoEntrar')->with('mensagem', 'Você não pode entrar');
    }
});

Route::get('/filmes', 'FilmesController@exibirTodos');