<?php //conexion con la base de datos + Select a la tabla movedb
    $host = 'localhost';
    $dbname = 'movedb';
    $user = 'Usuario_Aqualauro';
    $pass = 'Usuario1+';        
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
?>