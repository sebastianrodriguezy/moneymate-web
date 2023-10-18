<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  use HasFactory;

  protected $table = 'persons';
  protected $primaryKey = 'person_id';

  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'person_id',
    'fk_user_id',
    'name',
  ];
}
