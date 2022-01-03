<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteurslivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteurslivres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livres_id')->constrained('livres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('auteurs_id')->constrained('auteurs')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
            
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auteurslivres');
    }
}
