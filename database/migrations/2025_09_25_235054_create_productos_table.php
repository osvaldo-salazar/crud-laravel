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
        Schema::create('categorias', function (Blueprint $table) {
        $table->id('idCategoria');     
       $table->string('categoria');   
       $table->smallInteger('activo') ->default(1); 
    });

        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');                                
            $table->string('nombre', 100);       
            $table->string('descripcion', 250)->nullable(); 
            $table->decimal('precio', 10, 2)->default(0); 
            $table->date('fecha_lanzamiento')->nullable(); 
            $table->boolean('activo')->default(true); 
            $table->integer('id_categoria');          
            $table->timestamps();                    
  });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
        Schema::dropIfExists('categorias');
    }
};
