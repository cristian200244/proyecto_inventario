<?php

use App\Database;
use App\Mail;
require __DIR__ . '/vendor/autoload.php';

$db = new Database();
header('Content-Type: application/json');

$email = $_POST['email'];

$rows = $db->execute('select * from usuarios where correo = ?', [$email])->fetchAll(PDO::FETCH_CLASS) ;

$user = $rows[0] ?? null;

if ( $user == null){
    echo json_encode([
        'estado' => 'error',
        'mensage' => 'El correo es erroneo'
    ]);
} else {

    try {
        # Si un usuario enviamos el correo
        $password = bin2hex(random_bytes((6 - (6 % 2)) / 2));
        Mail::send($email, "Esta es tu nueva contraseña $password");

        $password_hash = md5($password);

        $db->update('usuarios', ['password' => $password_hash], "id = 1");

        echo json_encode([
            'estado' => 'correcto',
            'mensage' => 'Correo enviado por favor revise su buzon'
        ]);
        

    } catch (\Throwable $th) {
        echo json_encode([
            'estado' => 'error',
            'mensage' => $th->getMessage()
        ]);
    }
}

// echo $email;


// $db->update('usuarios', ['password' => $password_hash], "id = 1");
// $db->update('usuarios', ['password' => $password_hash], "id = 1");

// echo $password; exit;

// Mail::send("heilernova@gmail.com", "hola");



