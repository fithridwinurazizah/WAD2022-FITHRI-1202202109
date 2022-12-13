<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Cookie;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //

    if ($request->password == $request->password2) {
      $user = User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'no_hp' => $request->no,
        'password' => bcrypt($request->password),
      ]);
      if ($user) {
        return redirect('login');
      }
    } else {
      return back()->withErrors('Password Tidak Sesuai');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($name)
  {
    //
    $user = User::where('name', $name)->first();
    if ($user) {
      return view('profile', [
        'title' => 'Profile ' . $user->name,
        'row' => $user,
        'name' => $user->name,
      ]);
    } else {
      return back()->withErrors('User Tidak ditemukan');
    }
  }

  public function login(Request $request)
  {
    //
    error_log($request->remember);
    if ($request->remember) {
      $request->cookie('email', $request->email, 240);
      $request->cookie('password', $request->password, 240);
    } else {
    }
    if ($request->has('email')) {
      $user = User::where('email', $request->email)->first();
      if ($user) {
        $credentials = [
          'email' => $user->email,
          'password' => $request->password,
          'name' => $user->name,
        ];
        if (auth()->attempt($credentials)) {
          $request->session()->put('login', true);
          $request->session()->put('name', $user->name);
          return redirect(route('showrooms.index'));
        }
      } else {
        return back()->withErrors('User Tidak ditemukan');
      }
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    //
    $user = User::where('email', $request->email)->first();
    if ($request->password == $request->password2) {
      if ($user) {
        $user->name = $request->nama;
        $user->no_hp = $request->no;
        $user->save();
        return redirect()->route('profile', $user->name);
      } else {
        return back()->withErrors('User Tidak ditemukan');
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {
    //
  }
}
