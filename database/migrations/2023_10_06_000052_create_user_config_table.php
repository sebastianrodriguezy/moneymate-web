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
    Schema::create('user_config', function (Blueprint $table) {
      $table->string('fk_user_id')->primary();
      $table->enum('modal_movement_behaviour', ['close', 'still'])->default('still');
      $table->enum('theme', ['light', 'dark'])->default('light');
      $table->timestamps();
    });

    /* Commented because PlanetScale doesn't allow foreing keys on mysql DBS */

    /* Schema::table('user_config', function (Blueprint $table) {
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
    Schema::dropIfExists('user_config');
  }
};
