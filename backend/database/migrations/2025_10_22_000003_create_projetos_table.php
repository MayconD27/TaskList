<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->enum('status', ['feito', 'fazendo', 'pendente', 'em_progresso', 'concluido']);
            $table->text('descricao')->nullable();
            $table->integer('delete_flag')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('projetos');
    }
};
