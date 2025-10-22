<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TaskController extends Controller
{
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