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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('producto');
            $table->text('descripcion');
            $table->text('slug');
            $table->string('img');
            $table->Integer('precio')->default(0);
            $table->Integer('oferta')->default(0);
            $table->enum('frompage',['0','1']);
            $table->enum('publicar',['0','1']);
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();

            $table->foreign("id_categoria")
            ->references("id")
            ->on("productos_cat")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
