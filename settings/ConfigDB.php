<?php
    include_once "./db.php";
    class Config_DB {
        private $pdo;
        function __construct($pdo){
            $this->db = $pdo; 
        }
        function create_setores(){
            $sql = "CREATE TABLE IF NOT EXISTS setores 
            (
                id INT AUTO_INCREMENT PRIMARY KEY ,
                nome VARCHAR(30)
            )";
           $query = $this->db->prepare($sql);
           $query->execute();
        }
        function create_user(){
           $sql = "CREATE TABLE IF NOT EXISTS usuarios 
            (
                id INT AUTO_INCREMENT PRIMARY KEY , 
                user VARCHAR(30),
                `password` VARCHAR(250),
                nome VARCHAR(100),
                email VARCHAR(100),
                setor_id INT,
                image_perfil VARCHAR(200),
                delete_flag INT DEFAULT 0,
                FOREIGN KEY (setor_id) REFERENCES setores(id)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE
            )";
           $query = $this->db->prepare($sql);
           $query->execute();
        }
        function create_projets(){
           $sql = "CREATE TABLE IF NOT EXISTS projetos 
            (
                id INT AUTO_INCREMENT PRIMARY KEY ,
                titulo VARCHAR(50),
                `status` ENUM('feito', 'fazendo', 'pendente', 'em_progresso', 'concluido'),
                descricao TEXT,
                data_criacao DATE,
                delete_flag INT DEFAULT 0
            )";
           $query = $this->db->prepare($sql);
           $query->execute();
        }
        function create_task(){
           $sql = "CREATE TABLE IF NOT EXISTS tarefas 
            (
                id INT AUTO_INCREMENT PRIMARY KEY ,
                titulo VARCHAR(50),
                `status` ENUM('feito', 'fazendo', 'pendente', 'em_progresso', 'concluido'),
                comentario TEXT,
                usuario_id INT,
                setor_id INT,
                data_criacao DATE,
                projeto_id INT,
                delete_flag INT DEFAULT 0,
                FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,

                FOREIGN KEY (setor_id) REFERENCES setores(id)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE,

                FOREIGN KEY (projeto_id) REFERENCES projetos(id)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE
            )";
           $query = $this->db->prepare($sql);
           $query->execute();
        }
        function create_projets_user(){
           $sql = "CREATE TABLE IF NOT EXISTS projetos_usuarios 
            (
                id INT AUTO_INCREMENT PRIMARY KEY ,
                projeto_id INT,
                usuario_id INT,
                FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE,

                FOREIGN KEY (projeto_id) REFERENCES projetos(id)
                    ON DELETE SET NULL
                    ON UPDATE CASCADE
            )";
           $query = $this->db->prepare($sql);
           $query->execute();
        }
    }
    $config = New Config_DB($pdo);
    $config->create_setores();
    $config->create_user();
    $config->create_projets();
    $config->create_task();
    $config->create_projets_user();