<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('user', 30);
            $table->string('password', 250);
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->foreignId('setor_id')->nullable()->constrained('setores')->nullOnDelete()->cascadeOnUpdate();
            $table->string('image_perfil', 200)->nullable();
            $table->integer('delete_flag')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('usuarios');
    }
};
