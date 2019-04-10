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

/*Route::get('test', function (){
    $user = new App\User;
    $user->name = 'Carlos';
    $user->email = 'kamued@gmail.com';
    $user->password = bcrypt('123456');
    $user->save();

    return $user;
});*/
/*App\User::create([
    'name' => 'Jorge',
    'email' => 'kamued@gmail.com',
    'password' => bcrypt('123456'),
    'role' => 'admin'
]);
App\User::create([
    'name' => 'Char2',
    'email' => 'kamued2@gmail.com',
    'password' => bcrypt('123456'),
    'role' => '1'
]);*/

/*Route::get('roles',function(){
    //return \App\Role::all();
    return \App\Role::with('user')->get();
});*/

/*DB::listen(function($query){
   echo "<pre>{$query->sql}</pre>";
});*/

Route::get('/', ['uses' => 'PagesController@home'])->name('home')/*->middleware('example')*/;
//Route::get('contactame', ['uses'=> 'PagesController@contact'])->name('contactos');
Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses'=> 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");

//Route::post('contacto', 'PagesController@mensaje');

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersControllers');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');









/*Route::get('mensajes',['uses' => 'MessagesController@index'])->name('mensajes.index');
Route::get('mensajes/create',['uses' => 'MessagesController@create'])->name('mensajes.create');
Route::post('mensajes',['uses' => 'MessagesController@store'])->name('mensajes.store');
Route::get('mensajes/{id}',['uses' => 'MessagesController@show'])->name('mensajes.show');
Route::get('mensajes/{id}/edit',['uses' => 'MessagesController@edit'])->name('mensajes.edit');
Route::put('mensajes/{id}',['uses' => 'MessagesController@update'])->name('mensajes.update');
Route::delete('mensajes/{id}',['uses' => 'MessagesController@destroy'])->name('mensajes.destroy');*/

/*Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('contactame', ['as' => 'contactos', function () {
    //return view('welcome');
    //return "Sección de contactos";
    return view("contactos");
}]);

Route::get('saludos/{nombre?}', ['as' => 'saludos', function ($nombre = "Invitado"){
    //return view("saludo",['nombre' => $nombre]);
    //return view("saludo")->with(['nombre' => $nombre]);
    $html = "<h2>Contenido html</h2>";
    $script = "<script>alert('Problema XSS - Cross Site Scripting!!!')</script>";

    $consolas = [
        "PLAY",
        "xBOX ONE",
        "wii u"
    ];

    return view("saludo", compact('nombre', 'html', 'script', 'consolas'));
}])->where('nombre',"[A-Za-z]+");
*/
