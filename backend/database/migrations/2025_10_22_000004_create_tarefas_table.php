<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->enum('status', ['feito', 'fazendo', 'pendente', 'em_progresso', 'concluido']);
            $table->text('comentario')->nullable();
            $table->foreignId('usuario_id') ->nullable()->constrained('usuarios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('setor_id')->nullable()->constrained('setores')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('projeto_id')->nullable()->constrained('projetos')->nullOnDelete()->cascadeOnUpdate();
            $table->integer('delete_flag')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tarefas');
    }
};
