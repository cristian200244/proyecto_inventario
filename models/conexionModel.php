<?php
class Database{
    public $host;
    public $database;
    public $user;
    public $password;
    public $charset;

    public function __construct()
    {
        $this->host     = constant('HOST');
        $this->database = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');

    }

    public function conexion()
    {

        try {
            $con = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($con, $this->user, $this->password, $opt);

            return $pdo;
        } catch (PDOException $e) {
            print_r('Error en la conexión con la bases de datos:' . $e->getMessage("la conexion ha fallado"));
        }
    }
}




?>