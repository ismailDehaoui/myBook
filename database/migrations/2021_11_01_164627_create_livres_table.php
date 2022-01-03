<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('ISBN')->unique();
            $table->string('editeur');
            $table->integer('annee');
            $table->enum('langue', ['anglais', 'francais', 'arabe']);
            $table->integer('nombre_exemplaires_disponibles');
            $table->string('photo');
            $table->longText('resume');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('acteur')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livres');
    }
}
