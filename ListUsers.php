<?php
    class ListUsers extends Conn {

        public object $conn;

        public function list() :array {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM bills_pays u ORDER BY id";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            //var_dump($retorno);
            return $retorno;
        }
    }