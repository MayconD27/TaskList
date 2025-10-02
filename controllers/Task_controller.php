<?php
    //includes
    include_once "./settings/helpers.php";

    //headers
    //header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    class Task {
        function __construct(){
            $this->helpers = new Helpers ;
            // Detecta método HTTP
            $this->requestMethod = $_SERVER['REQUEST_METHOD'];

            // Captura dados conforme método
            if ($this->requestMethod === "GET") {

                $this->requestData = $_GET; // parâmetros via URL

            } elseif ($this->requestMethod === "POST") {

                $json = file_get_contents("php://input");
                $this->requestData = json_decode($json, true); // parâmetros via body JSON

            } else {
                $this->helpers->responseApi("error", "Método não permitido");
            }

            // Pega ação
            $action = $this->requestData['action'] ?? null;

            if ($action && method_exists($this, $action)) {
                $this->$action(); // chama automaticamente
            } else {
                $this->helpers->responseApi("error", "Ação inválida ou não especificada", [], 400);
            }
        }

        public function getTask(){
            try{
                $data = [];
            }
            catch(Exception $e){
                $this->helpers->responseApi("error", $e->getMessage());
            }
        }
    }


    // Criando a instância
    $task = new Task();

