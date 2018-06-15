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


        Schema::connection('pgsql')->create('prestamo', function($table)
        {

            $table->increments('idprestamo');
            $table->float('monto')->required();
            $table->float('cuotadiaria')->required();
            $table->date('fechaultimapago')->nullable();
            $table->timestamps();
        });

        
        Schema::connection('pgsql')->create('ejecutivo', function($table)
        {
            $table->increments('idejecutivo');
            $table->string('nombreejecutivo',50)->required();
            $table->string('supervisor',50)->required();
            $table->string('clasificacion',1)->required();
            $table->timestamps();
        });


        Schema::connection('pgsql')->create('carteraExtendida', function($table)
        {
            $table->increments('idcarexte');
            $table->float('saldocapital');
            $table->float('moraexte');
            $table->date('fecha')->nullable();
            $table->string('intetotal',10)->required();
            $table->timestamps();
        });


        Schema::connection('pgsql')->create('cartera', function($table)
        {

            $table->integer('idejecutivo')->unsigned();
            $table->index('idejecutivo');
            $table->foreign('idejecutivo')->references('idejecutivo')->on('ejecutivo')->onDelete('cascade');

            $table->increments('idcartera');
            $table->string('nombre',50)->required();
            $table->timestamps();
        });

        Schema::connection('pgsql')->create('cliente', function($table)
        {

            $table->integer('idcartera')->unsigned();
            $table->index('idcartera');
            $table->foreign('idcartera')->references('idcartera')->on('cliente')->onDelete('cascade');

            $table->increments('idcliente');
            
            $table->string('nombre',50)->required();
            $table->string('apellido',50)->required();
            $table->string('dui',10)->required();
            $table->string('nit',17)->required();
            $table->string('estado',10);
            $table->timestamps();
        });



        Schema::connection('pgsql')->create('negocio', function($table)
        {

            $table->integer('idcliente')->unsigned();
            $table->index('idcliente');
            $table->foreign('idcliente')->references('idcliente')->on('cliente')->onDelete('cascade');

            $table->increments('idnegocio');
            $table->string('nombre',50)->required();
            $table->boolean('estadomora');
            $table->timestamps();
        });

        Schema::connection('pgsql')->create('cuenta', function($table)
        {

            $table->integer('idnegocio')->unsigned();
            $table->index('idnegocio');
            $table->foreign('idnegocio')->references('idnegocio')->on('negocio')->onDelete('cascade');

            $table->increments('idcuenta');
            $table->float('montocapital');
            $table->float('montopagado');
            $table->float('interes');
            $table->date('fechaultimapago')->nullable();
            $table->float('mora')->nullable();
            $table->integer('cuotaatrasada')->nullable();
            $table->string('estado',10);
            $table->timestamps();
        });


        


        

       

      
       


        Schema::connection('pgsql')->create('detalle_liquidacion', function($table)
        {

            $table->integer('idcuenta')->unsigned();
            $table->index('idcuenta');
            $table->foreign('idcuenta')->references('idcuenta')->on('cuenta')->onDelete('cascade');

            $table->increments('iddetalleliquidacion');
            $table->date('fechaefectiva')->nullable();
            $table->float('monto')->nullable();
            $table->decimal('cuotacapital',6, 2)->nullable();
            $table->decimal('totaldiario',6, 2)->nullable();
            $table->float('interes')->nullable();
            $table->string('estado',10)->nullable();
            $table->date('fechadiaria')->nullable();
            $table->string('abonocapital',10)->nullable();
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
