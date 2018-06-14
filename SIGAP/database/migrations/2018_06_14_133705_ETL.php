<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ETL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection('pgsql')->create('cartera', function($table)
        {
            $table->increments('idcartera');
            $table->string('nombre',50)->required();
            $table->string('estado',10);
            $table->string('ejecutivo',50);
            $table->string('supervisor',50);

            $table->timestamps();
        });

        Schema::connection('pgsql')->create('cliente', function($table)
        {
            $table->increments('idcliente');

            //CAMPO PARA RELACIONAR negocio CON cartera
            $table->integer('idcartera')->unsigned();
            $table->index('idcartera');
            $table->foreign('idcartera')->references('idcartera')->on('cartera')->onDelete('cascade');            

            $table->string('nombre',50)->required();
            $table->string('apellido',50)->required();
            $table->string('dui',10)->required();
            $table->string('nit',17)->required();
            $table->string('estado',10);
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
        Schema::drop('cartera');
        Schema::drop('cliente');
    }
}
