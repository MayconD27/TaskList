<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
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

    //coleta todos os dados sem tratar
    public function index()
    {
        try {
            $tarefas = Tarefa::all();
            return response()->json([
                "status" => "success",
                "message" => "Tarefas obitidas com sucesso",
                "data" => $tarefas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    //coleta 1 dado sem tratar
    public function get(int $id){
        try{
            $tarefa = Tarefa::find($id);
            if(empty($tarefa)){
                throw new \Exception("Tarefa não encontrado");
            }
            return [response()->json([
                "status" => "success",
                "message" => "Tarefa ". $tarefa->id ." encontrada"
            ]),200];
        }
        catch(\Exception $e){
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ],404);
        }
    }

    //insert
    public function store(StoreTarefaRequest $request){
        try{
            $data = $request->validated();
            $tarefa = new Tarefa();
            $result = $tarefa->store($data);
            if(empty($result)){
                throw new \Exception("Erro ao adicionar nova tarefa");
            }
            return response()->json(["status"=>"success", "message"=>"Exito ao inserir tarefa"],200);
        }
        catch(\Exception $e){
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ],400);
        }
    }

    public function update(UpdateTarefaRequest $request, int $id){
        try{
            $data = $request->validated();
            $tarefa = Tarefa::find($id);
            if(empty($tarefa)){
                throw new \Exception("Tarefa não encontrada");
            }
            $result = $tarefa->updateTarefa($data);
            if(empty($result)){
                throw new \Exception("Erro ao atualizar nova tarefa");
            }
            return response()->json(["status"=>"success", "message"=>"Exito ao atualizar tarefa"],201);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ],404);
        }
    }
    public function delete(int $id){
        try{
            $tarefa = Tarefa::find($id);
            if(empty($tarefa)){
                throw new \Exception("Tarefa não encontrada");
            }
            $result = $tarefa->deleteTarefa($id);
            if(empty($result)){
                throw new \Exception("Erro ao deletar nova tarefa");
            }
            return response()->json(["status"=>"success", "message"=>"Exito ao deletar tarefa"],201);

        }
        catch(\Exception $e){
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ],404);
        }
    }
}
