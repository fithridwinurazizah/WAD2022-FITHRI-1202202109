<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showrooms extends Model
{
  use HasFactory;
  protected $table = 'showrooms';
  protected $fillable = [
    'name',
    'user_id',
    'owner',
    'brand',
    'purchase_date',
    'image',
    'description',
    'status',
  ];

  protected $hiddeng = ['created_at', 'updated_at'];
}
