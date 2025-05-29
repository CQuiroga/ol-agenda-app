<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$root = $_SERVER['DOCUMENT_ROOT'] . '/ol-agenda-app';

/* ======================================================
   === Incluye el modelo y sus manejadores (CRUDS) === */

require_once('../Models/Contacto.php');
require_once('../Actions/Crud_Contacto.php');

/* ======================================================
   ========= Instancia modelo y sus manejadores ====== */

$crud = new CrudContacto();
$contacto = new Contacto();

/* ======================================================
   ============ Preparación Datos dinámicos ========== */

require_once('../Config/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ob_clean();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    switch ($_POST['accion']) {
        case 'crear':

            header('Content-Type: application/json');
            
            $contacto->setNombre($nombre);
            $contacto->setTelefono($telefono);
            $contacto->setEmail($email);

            try {
                $resultado = $crud->crear($contacto);

                if ($resultado) {
                    echo json_encode([
                        'success' => "1",
                        'contacto' => [
                            'id' => $resultado->getIdContacto(),
                            'nombre' => $resultado->getNombre(),
                            'telefono' => $resultado->getTelefono(),
                            'email' => $resultado->getEmail(),
                            'estado' => $resultado->getEstado()
                        ]
                    ]);
                } else {
                    echo json_encode(array('success' => "0"));
                }
            } catch (PDOException $e) {
                echo json_encode(array('success' => "2", 'error' => $e->getMessage()));
            }
        break;

        case 'editar':

            header('Content-Type: application/json');
            
            $contacto->setIdContacto($id);
            $contacto->setNombre($nombre);
            $contacto->setTelefono($telefono);
            $contacto->setEmail($email);

            try {
                $resultado = $crud->actualizar($contacto);

                if ($resultado) {
                    echo json_encode(array('success' => "1"));
                } else {
                    echo json_encode(array('success' => "0"));
                }
            } catch (PDOException $e) {
                echo json_encode(array('success' => "2", 'error' => $e->getMessage()));
            }
        break;

        case 'eliminar':
            header('Content-Type: application/json');

            try {
                $resultado = $crud->eliminar($id);

                if ($resultado) {
                    echo json_encode(array('success' => "1"));
                } else {
                    echo json_encode(array('success' => "0"));
                }
            } catch (PDOException $e) {
                echo json_encode(array('success' => "2", 'error' => $e->getMessage()));
            }
        break;
        
        default:
            # code...
            break;
    }

    
}
