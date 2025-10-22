<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TaskController extends Controller
{
        /**
     * @OA\Get(
     *     path="/tasks",
     *     operationId="getTasks",
     *     tags={"Tasks"},
     *     summary="Lista todas as tarefas",
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="titulo", type="string"),
     *                 @OA\Property(property="status", type="string")
     *             )
     *         )
     *     )
     * )
     */
    public function index(){
        return "";
    }
    public function get(){
        try{
            $tarefas = Tarefa::all();
            return response()->json([
                'sucess' => 'sucess',
                'total' => $tarefas->count(),
                'data' => $tarefas
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'sucess' => 'error',
            ]);
        }
    }
}