<?php
session_start();
require('../Config/Conexion.php');
$db = Db::conectar();

/* === Verifica si hay conexión ==== */

if ($db === null) {
    echo json_encode(array('success' => 2));
    exit;
}

/* === Consulta en Bd y compara ==== */

if (isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $User = $_POST['email'];
    $Pass = md5($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
        try { 
            $stmt = $db->prepare($sql); 
            $stmt->execute([
                ':email' => $User,
                ':password' => $Pass
            ]);

            $resultUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultUsuario as $usuario) {
                $UserCons = $usuario['email'];
                $PassCons = $usuario['password'];
            }

            if (($UserCons == $User) && ($PassCons == $Pass)) {

                $_SESSION['active'] = true;
                echo json_encode(['success' => 1]);
            } else {
                echo json_encode(['success' => 0]);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => 0]);
        }
} 
else {
    echo json_encode(array('success' => 0));
}