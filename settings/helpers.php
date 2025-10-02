<?php
    class Helpers{
        function __construct(){
             
        }
        public function responseApi($status = "", $message = "", $data = [])
        {
        // Monta o array de resposta
        $response = [
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ];

        // Retorna em JSON
        header('Content-Type: application/json; charset=utf-8');
        //JSON_UNESCAPED_SLASHES -> evita escapar barras
        //JSON_UNESCAPED_UNICODE -> evita transformar caracteres
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        die; // garante que não continue a execução
    }
    } 