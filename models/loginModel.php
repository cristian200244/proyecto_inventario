<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';

class User {
    private $db;
    
    public function __construct() {
        $this->db = new mysqli('localhost', 'sistema_inventario', 'contrasena_db', 'nombre_db');
        
        if ($this->db->connect_error) {
            die('Error al conectar a la base de datos: ' . $this->db->connect_error);
        }
    }
    
    public function verifyCredentials($username, $password) {
        $query = "SELECT u.id_persona, correo* FROM usuarios AS u JOIN personas AS p
        ON u.id_persona = p.id_persona WHERE id_rol =1 AND u.estado = 1 AND correo =  'CORREO12@GMAIL.COM' AND PASSWORD = '123456'";
        $result = $this->db->query($query);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        
        return false;
    }
}
?>
