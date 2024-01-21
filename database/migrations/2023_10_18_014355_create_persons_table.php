<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('persons', function (Blueprint $table) {
      $table->string('person_id')->primary();
      $table->string('fk_user_id');
      $table->string('name');
      $table->timestamps();
    });

    /* Commented because PlanetScale doesn't allow foreing keys on mysql DBS */

    /* Schema::table('persons', function (Blueprint $table) {
      $table->foreign('fk_user_id')
        ->references('user_id')
        ->on('users')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    }); */
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('persons');
  }
};
