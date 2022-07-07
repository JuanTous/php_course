<?php

require_once('../../conexion.php');

class materias extends Conexion{
 
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($materia) {
        $statement = $this->db->prepare("insert into materias (MATERIA)
        values(:materia)");
        $statement->bindParam(':materia', $materia);
    
        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/add.php');
        }
    }

    public function get() 
    {
        $rows = null;
        $statement = $this->db->prepare("select * from materias");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($id) {
        $rows = null;
        $statement = $this->db->prepare("select * from materias where ID_MATERIA = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id, $materia) {
        $statement = $this->db->prepare("update materias set MATERIA = :materia where ID_MATERIA = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':materia', $materia);

        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/add.php');
        }
    }

    public function delete($id) 
    {
        $statement = $this->db->prepare("delete from materias where ID_MATERIA = :id");
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/delete.php');
        }
    }

}
?> 