<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowroomsController;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
  if ($request->session()->get('login') == true) {
    return view('home', [
      'title' => 'Home',
      'name' => $request->session()->get('name'),
    ]);
  } else {
    return redirect('login');
  }
})->name('root');

Route::get('/login', function () {
  if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    return view('login', [
      'email' => $email,
      'password' => $password,
      'title' => 'Login',
    ]);
  }
  return view('login', [
    'title' => 'Login',
  ]);
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('loginAction');

Route::get('/register', function () {
  return view('register', ['title' => 'Register']);
})->name('register');

Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/logout', function (Request $request) {
  $request->session()->flush();
  return redirect('login');
})->name('logout');

Route::resource('showrooms', ShowroomsController::class)->only([
  'index',
  'create',
  'store',
  'show',
  'edit',
]);

Route::get('/showrooms/delete/{id}', [ShowroomsController::class, 'destroy']);

Route::post('/showrooms/{id}/edit', [
  ShowroomsController::class,
  'update',
])->name('edit');

Route::get('/profile/{name}', [UserController::class, 'show'])->name('profile');
Route::post('/profile/update', [UserController::class, 'update'])->name(
  'profileUpdate'
);
