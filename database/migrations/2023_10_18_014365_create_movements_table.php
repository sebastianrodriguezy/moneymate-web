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
    Schema::create('movements', function (Blueprint $table) {
      $table->string('movement_id')->primary();
      $table->string('fk_user_id');
      $table->string('fk_category_id');
      $table->string('fk_person_id')->nullable();
      $table->enum('type', ['discharge', 'income']);
      $table->unsignedInteger('amount');
      $table->date('movement_date');
      $table->string('comments')->nullable();
      $table->timestamps();
    });

    Schema::table('movements', function (Blueprint $table) {
      $table->foreign('fk_user_id')
        ->references('user_id')
        ->on('users')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreign('fk_category_id')
        ->references('category_id')
        ->on('categories')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreign('fk_person_id')
        ->references('person_id')
        ->on('persons')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movements');
  }
};
