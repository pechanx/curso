<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rol', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->integer('user_id')->unsigned();
            $table->integer('rol_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rol');
    }
}
