<?php
  session_start();
  if (!isset($_SESSION['correo'])) {
    header('location: index.php');
    exit();
  }
?>