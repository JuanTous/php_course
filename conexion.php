<?php
class Conexion
{
    protected $db;

    public function __construct()
    {
        try {
            $db = new PDO('mysql:host=localhost; dbname=notas', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo ('¡Se ha presentado un error! ---> ' . $e->getMessage());
        }
    }
}
