<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showrooms;
use App\Models\User;

class ShowroomsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    //
    if ($request->session()->get('login') == true) {
      $name = $request->session()->get('name');
      return view('showrooms.index', [
        'title' => 'List Car',
        'name' => $name,
        'showrooms' => Showrooms::all(),
      ]);
    } else {
      return redirect()->route('login');
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    //
    if ($request->session()->get('login') == true) {
      $name = $request->session()->get('name');
      return view('showrooms.create', [
        'title' => 'Create Car',
        'name' => $name,
      ]);
    } else {
      return redirect()->route('login');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // get user where name
    $user = User::where('name', $request->session()->get('name'))->first();
    //
    $file = $request->file('foto');
    $destinationPath = public_path();
    $file->move($destinationPath, $file->getClientOriginalName());
    $showrooms = new Showrooms();
    $showroom = Showrooms::create([
      'name' => $request->nama_mobil,
      'user_id' => $user->id,
      'owner' => $request->nama_pemilik,
      'brand' => $request->merk,
      'purchase_date' => $request->tanggal,
      'description' => $request->deskripsi,
      'image' => $file->getClientOriginalName(),
      'status' => $request->status[0],
    ]);

    return redirect()->route('showrooms.index');
  }

  /**
   * D
   * isplay the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
    $showrooms = Showrooms::where('id', $id)->first();
    return view('showrooms.show', [
      'showroom' => $showrooms,
      'title' => 'Detail Mobil' . $showrooms->name,
    ]);
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
    $showrooms = Showrooms::where('id', $id)->first();
    return view('showrooms.edit', [
      'showroom' => $showrooms,
      'title' => 'Edit Mobil' . $showrooms->name,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function updates(Request $request, $id)
  {
    //
    $showrooms = Showrooms::where('id', $id)->first();
    $showrooms->name = $request->nama_mobil;
    $showrooms->owner = $request->nama_pemilik;
    $showrooms->brand = $request->merk;
    $showrooms->purchase_date = $request->tanggal;
    $showrooms->description = $request->deskripsi;
    $showrooms->status = $request->status[0];
    if ($request->file('foto') != null) {
      $showrooms->image = $request->file('foto')->getClientOriginalName();
      $destinationPath = public_path();
      $request
        ->file('foro')
        ->move(
          $destinationPath,
          $request->file('foro')->getClientOriginalName()
        );
      unlink(public_path($showroom->image));
    }
    $showrooms->save();
    return redirect()->route('showrooms.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
    $showrooms = Showrooms::find($id);
    $showrooms->delete();
    return redirect()->route('showrooms.index');
  }
}
