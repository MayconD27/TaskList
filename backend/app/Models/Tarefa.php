<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model para a tabela 'tarefas'.
 * Por convenção, o Laravel procuraria por 'tarefas', mas explicitamos para garantir.
 */
class Tarefa extends Model
{
    use HasFactory;

    /**
     * Define o nome da tabela no banco de dados.
     * Necessário pois o Laravel espera 'tarefas' (plural de Task em inglês) ou 'tarefas' (plural de Tarefa).
     * Explicitamos para maior clareza.
     *
     * @var string
     */
    protected $table = 'tarefas';

    /**
     * Define os campos que podem ser preenchidos em massa (Mass Assignable).
     * Ajuste esta lista com as colunas reais da sua tabela 'tarefas'.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'prioridade',
        'data_vencimento',
    ];

    // Se a sua tabela não usa 'created_at' e 'updated_at', descomente a linha abaixo:
    // public $timestamps = false;
}
