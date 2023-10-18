<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movement extends Model
{
  use HasFactory;

  protected $table = 'movements';
  protected $primaryKey = 'movement_id';

  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'movement_id',
    'fk_user_id',
    'fk_category_id',
    'fk_person_id',
    'type',
    'amount',
    'movement_date',
    'comments',
  ];

  public function category(): HasOne
  {
    return $this->hasOne(Category::class, 'fk_category_id');
  }

  public function person(): HasOne
  {
    return $this->hasOne(Person::class, 'fk_person_id');
  }

  public function user(): HasOne
  {
    return $this->hasOne(User::class, 'fk_user_id');
  }
}
