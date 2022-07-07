<?php

require_once('conexion.php');

class metodos extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function getMaterias()
    {
        $rows = null;
        $statement = $this->db->prepare("select * from materias");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getDocentes()
    {
        $rows = null;
        $statement = $this->db->prepare("select * from usuarios where PERFIL = 'docente'");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }
}

?> 