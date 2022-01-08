<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpruntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('est_rendu')->default(false);
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
<<<<<<< HEAD
            $table->foreignId('abonnes_id')->constrained('abonnes') ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('livres_id')->constrained('livres')->onDelete('cascade')->onUpdate('cascade');
            
=======
            $table->foreignId('abonnes_id')->constrained('abonnes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('livres_id')->constrained('livres')->onDelete('cascade')->onUpdate('cascade');            
>>>>>>> c3a8a19fe5bfa1fcdc510ac5d9833565b898fffd
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprunts');
    }
}
