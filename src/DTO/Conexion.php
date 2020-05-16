<?php

namespace App\DTO;

use mysqli;

class Conexion{

    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $dbName = 'instaface';
    public $connect;

    public function connect()
    {
        $this->connect = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if (!$this->connect) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        echo "Se ha conectado con éxito a la base de datos";

        return $this->connect;
    }

    public function connectClose(){
        if ($this->connect) {
            mysqli_close($this->connect);
        }
    }

}