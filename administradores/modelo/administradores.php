<?php

require_once('../../conexion.php');

class administradores extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($nombre, $apellido, $usuario, $contrasena)
    {
        $statement = $this->db->prepare("insert into usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, ESTADO)
                                    values(:nombre, :apellido, :usuario, :password, 'administrador', 'activo')");
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':password', $contrasena);

        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/add.php');
        }
    }

    public function get()
    {
        $rows = null;
        $statement = $this->db->prepare("select * from usuarios where PERFIL = 'administrador'");
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($id)
    {
        $rows = null;
        $statement = $this->db->prepare("select * from usuarios where PERFIL = 'administrador' and ID_USUARIO = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id, $nombre, $apellido, $usuario, $contrasena, $estado)
    {
        $statement = $this->db->prepare("update usuarios set NOMBRE = :nombre, APELLIDO = :apellido, USUARIO = :usuario, PASSWORD = :password, ESTADO = :estado where ID_USUARIO = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':password', $contrasena);
        $statement->bindParam(':estado', $estado);

        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/edit.php');
        }
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("delete from usuarios where ID_USUARIO = :id");
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            header('Location: ../pages/index.php');
        } else {
            header('Location: ../pages/delete.php');
        }
    }
}

?> 