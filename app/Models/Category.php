<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $table = 'categories';
  protected $primaryKey = 'category_id';

  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'category_id',
    'fk_user_id',
    'name',
    'color',
  ];
}
