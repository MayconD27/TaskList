<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa; 

class TarefaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/tarefas",
     *     summary="Listar todas as tarefas",
     *     tags={"Tarefas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista retornada com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Success"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="titulo", type="string", example="Implementar login no sistema"),
     *                     @OA\Property(property="status", type="string", example="Em andamento")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function get()
    {
        try {
            $tarefas = Tarefa::all();
            return response()->json([
                "status" => "success",
                "message" => "Success",
                "data" => $tarefas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
}
