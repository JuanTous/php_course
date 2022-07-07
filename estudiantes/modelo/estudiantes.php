<?php

require_once('../../conexion.php');

class estudiantes extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($nombre, $apellido, $documento, $correo, $materia, $docente, $promedio, $fecha)
    {
        $statement = $this->db->prepare("insert into estudiantes (NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO)
                                    values(:nombre, :apellido, :documento, :correo, :materia, :docente, :promedio, :fecha)");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':materia', $materia);
        $statement->bindParam(':docente', $docente);
        $statement->bindParam(':promedio', $promedio);
        $statement->bindParam(':fecha', $fecha);

        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/add.php');
        }
    }

    public function get()
    {
        $rows = null;
        $statement = $this->db->prepare("select * from estudiantes");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($id)
    {
        $rows = null;
        $statement = $this->db->prepare("select * from estudiantes where ID_ESTUDIANTE = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id, $nombre, $apellido, $documento, $correo, $materia, $docente, $promedio, $fecha)
    {
        $statement = $this->db->prepare("update estudiantes set NOMBRE = :nombre, APELLIDO = :apellido, DOCUMENTO = :documento, CORREO = :correo, MATERIA = :materia, DOCENTE = :docente, PROMEDIO = :promedio, FECHA_REGISTRO = :fecha where ID_ESTUDIANTE = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':correo', $correo);
        $statement->bindParam(':materia', $materia);
        $statement->bindParam(':docente', $docente);
        $statement->bindParam(':promedio', $promedio);
        $statement->bindParam(':fecha', $fecha);

        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/add.php');
        }
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("delete from estudiantes where ID_ESTUDIANTE = :id");
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/delete.php');
        }
    }

    public function search($search)
    {
        $rows = null;
        $statement = $this->db->prepare("select ID_ESTUDIANTE, NOMBRE, APELLIDO, DCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO from estudiantes 
    where NOMBRE like concat('%', :search,'%') or APELLIDO like concat('%', :search,'%') or DOCUMENTO like concat('%', :search,'%') or CORREO like concat('%', :search,'%') or MATERIA like concat('%', :search,'%') or DOCENTE like concat('%', :search,'%')");
        $statement->bindParam(':search', $search);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }
}

?> 