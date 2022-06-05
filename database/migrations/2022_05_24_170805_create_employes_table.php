<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('poste');
            $table->string('age');
            $table->string('salaire');
            $table->string('image');
            $table->unsignedBigInteger('societeID');
            $table->foreign('societeID')
            ->references('id')
            ->on('societes')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->unsignedBigInteger('departementID');
            $table->foreign('departementID')
            ->references('id')
            ->on('departements')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
};
