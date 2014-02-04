<?php
$name = $_POST['fname'];
$mail = $_POST['id'];


$conexion = new PDO('mysql:host=localhost;dbname=pruebas_db','root','root');

$qry = $conexion->prepare('INSERT INTO pb_usuarios(user_name, user_mail) VALUES (?, ?)');
$qry->execute(array($name, $mail));

