<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;

class Crud extends Eloquent
{
  use HasFactory;

  protected $table = 'user';
  protected $fillable = ['name', 'email', 'password', 'no_hp'];

  protected $hidden = [
    'password',
    'remember_token',
    'created_at' . 'update_at',
  ];

  public function create()
  {
    $user = $this->factory->create();
    $user->name = $this->name;
    $user->email = $this->email;
    $user->password = bcrypt($this->password);
    $user->save();
  }
}
