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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->string('img');
            $table->enum('frompage',['0','1']);
            $table->enum('publicar',['0','1']);
            $table->enum('hijo',['no','si'])->default('no');
            $table->bigInteger('id_padre')->default(0);
            $table->unsignedBigInteger('id_tipo');
            $table->timestamps();

            $table->foreign("id_tipo")
            ->references("id")
            ->on("contenido_tipos")
            ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};
