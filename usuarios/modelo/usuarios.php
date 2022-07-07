<?php

require_once('../../conexion.php');
session_start();

class usuarios extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function login($usuario, $contrasena)
    {
        $statement = $this->db->prepare("select * from usuarios where USUARIO = :usuario and PASSWORD = :password");
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':password', $contrasena);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $result = $statement->fetch();
            $_SESSION['nombre'] = $result['NOMBRE'] . " " . $result['APELLIDO'];
            $_SESSION['id'] = $result['ID_USUARIO'];
            $_SESSION['perfil'] = $result['PERFIL'];
            return true;
        }
        return false;
    }

    public function getNombre()
    {
        return $_SESSION['nombre'];
    }

    public function getId()
    {
        return $_SESSION['id'];
    }

    public function getPerfil()
    {
        return $_SESSION['perfil'];
    }

    public function validateSession()
    {
        if ($_SESSION['id'] == null) {
            header('Location: ../../index.php');
        }
    }

    public function validateSessionAdministrador()
    {
        if ($_SESSION['id'] != null) {
            if ($_SESSION['perfil'] == 'docente') {
                header('Location: ../../estudiantes/pages/index.php');
            }
        }
    }

    public function salir()
    {
        $_SESSION['ID'] = null;
        $_SESSION['NOMBRE'] = null;
        $_SESSION['PERFIL'] = null;
        session_destroy();
        header('Location: ../../index.php');
    }
}
