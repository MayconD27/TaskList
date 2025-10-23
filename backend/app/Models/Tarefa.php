<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, se seguir plural padrão)
    protected $table = 'tarefas';
    
    // Campos que podem ser preenchidos via create() ou update()
    protected $fillable = [
        'titulo',
        'status',
        'comentario',
        'usuario_id',
        'setor_id',
        'projeto_id',
        'delete_flag',
        'data_criacao'
    ];
    
}
