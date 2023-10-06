<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
  use HasFactory;

  protected $table = 'user_config';
  protected $primaryKey = 'fk_user_id';

  protected $fillable = [
    'fk_user_id',
    'modal_movement_behaviour',
    'theme'
  ];
}
