<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotscleslivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motscleslivres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livres_id')->constrained('livres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('motscles_id')->constrained('motscles')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('motscleslivres');
    }
}
