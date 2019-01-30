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
DB::listen(function($query){
	//echo "<pre>{$query->sql}</pre>";
});
Route::get('roles',function(){
	return \App\Role::with('user')->get();
	// return \App\Role::all();
});
Route::get('test',function(){
$user= new App\User;
$user->name='Elizabeth';
$user->email='admin1';
$user->role_id='2';
$user->password=bcrypt('admin');
$user->save();
return $user;
});
Route::get('/',['as'=>'inicio', function () {
   return view( 'home' );
}]);
Route::get('Reporte_Venta_Caja', 'PDFController@ReporteVentaCaja');

Route::get('contactos',['as'=>'contactanos', 'uses' => 'ContactanosController@index']);

Route::post( 'contactos', 'ContactanosController@mensajes' );

Route::get('login','Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
Route::resource('usuarios','UsersController');
Route::resource('mensaje','MessageController');
