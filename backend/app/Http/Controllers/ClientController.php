<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Retorna uma lista de clientes (exemplo de endpoint de API).
     */
    public function index()
    {
        // Neste exemplo, retornamos um array simples.
        // Em um projeto real, você faria uma consulta ao banco:
        // $clients = Client::all();
        
        $clients = [
            ['id' => 1, 'nome' => 'Maycon Douglas', 'status' => 'Ativo'],
            ['id' => 2, 'nome' => 'Empresa Teste', 'status' => 'Pendente'],
        ];

        // O Laravel converte este array para JSON automaticamente.
        return $clients;

        // Ou, de forma mais explícita:
        // return response()->json($clients);
    }
}