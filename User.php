<?php
    class User extends Conn {
        //Atributos da classe
        public object $conn;
        public array $formData;
        public  int $id;

        public function list() :array {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM bills_pays u ORDER BY id";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            //var_dump($retorno);
            return $retorno;
        }

        //Só colocar a tipagem "bool", se no servidor tiver o php 8, caso contrario nao coloca.
        public function insert(): bool {
            $this->conn = $this->conectar();
            $query = "INSERT INTO bills_pays  (nome,valor,installments,obs,created,due_date) VALUES (:nome,:valor,:installments,:obs,
            :created,:due_date )";
            $add_user = $this->conn->prepare($query);
            $add_user->bindParam(':nome', $this->formData['nome']);
            $add_user->bindParam(':valor', $this->formData['valor']);
            $add_user->bindParam(':installments', $this->formData['installments']);
            $add_user->bindParam(':obs', $this->formData['obs']);
            $add_user->bindParam(':created', $this->formData['created']);
            $add_user->bindParam(':due_date', $this->formData['due_date']);
           
            $add_user->execute();
            if ($add_user->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function View() {
            $this->conn = $this->conectar();
            $query = "SELECT * FROM  bills_pays  WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
          /*   $result->bindParam('id', $this->id); */
          $result->bindParam(':id',$this->id);
            $result->execute();
            $retorno = $result->fetch();
            return $retorno;
        }
        }
