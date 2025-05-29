<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_DEPRECATED);

/* ======================================================
   ================ Incluye la clase Db ============== */

// require_once('../../Config/Conexion.php');
require_once(__DIR__ . '/../Config/Conexion.php');
require_once(__DIR__ . '/../Models/Contacto.php');
// require_once('../../Models/Contacto.php');

class CrudContacto{
	public function __construct(){}

/* ======================================================
   =============== Método para Insertar ============== */

	public function crear($contacto){
      $db=Db::conectar();
                
      $insert = $db->prepare('INSERT INTO contactos(nombre, telefono, email, estado) 
      VALUES (:nombre, :telefono, :email, 1)');

      $nombre = htmlentities($contacto->getNombre(), ENT_QUOTES, 'utf-8');
      $telefono = htmlentities($contacto->getTelefono(), ENT_QUOTES, 'utf-8');
      $email = htmlentities($contacto->getEmail(), ENT_QUOTES, 'utf-8');

      $insert->bindParam(":nombre", $nombre, PDO::PARAM_STR,100);
      $insert->bindParam(':telefono',$telefono, PDO::PARAM_STR,100);
      $insert->bindParam(':email',$email, PDO::PARAM_STR,100);


		if ($insert->execute()) {
        $id = $db->lastInsertId();
        $contacto->setIdContacto($id);
        return $contacto;  
      } else {
         return false;
      }
   }
     		
/* ======================================================
   =============== Método para Actualizar ============ */

	public function actualizar($contacto){
    $db = Db::conectar();
    $actualizar = $db->prepare('UPDATE contactos SET nombre = :nombre, telefono = :telefono, email = :email WHERE id = :id');
    $actualizar->bindParam(':id', $contacto->getIdContacto());
    $actualizar->bindParam(':nombre', $contacto->getNombre());
    $actualizar->bindParam(':telefono', $contacto->getTelefono());
    $actualizar->bindParam(':email', $contacto->getEmail());

    return $actualizar->execute();
}

/* ======================================================
   ============= Método para Mostrar todo ============ */
 
	public function listarTodo(){
	   $db = Db::conectar();
      $listaContactos = [];

      $select = $db->query("SELECT * FROM contactos WHERE 1 ORDER BY id DESC;");
        
		foreach($select->fetchAll() as $contacto){
         $myContacto= new Contacto();
         $myContacto->setIdContacto($contacto['id']);
         $myContacto->setNombre($contacto['nombre']);
         $myContacto->setTelefono($contacto['telefono']);
         $myContacto->setEmail($contacto['email']);
         $myContacto->setEstado($contacto['estado']);

         $listaContactos[] = $myContacto;
		}
			return $listaContactos;
   }   
      
   /* ======================================
      ======== Método para Buscar ======= */

   /* public function obtenerContacto($Id){
      $db=Db::conectar();
      $select=$db->prepare('SELECT * FROM contactos WHERE id =:Id AND IdEstado = 1');
      $select->bindValue(':Id',$Id);
      $select->execute();

      $contacto=$select->fetch();
      $myContacto= new Contacto();
      $myContacto->setIdContacto($contacto['Id']);
      $myContacto->setNombre($contacto['Nombre']);
      $myContacto->setTelefono($contacto['Telefono']);
      $myContacto->setEmail($contacto['Email']);
      $myContacto->setEstado($contacto['Estado']);
      return $myContacto;
   }    */  

/* ======================================================
   ======= Método para Eliminar (Borrado Lógico) ===== */

	public function eliminar($id){
      $db=Db::conectar();
      $eliminar=$db->prepare('UPDATE contactos SET estado = false WHERE id = :id');
      
      $eliminar->bindValue(':id',$id);
      return $eliminar->execute();
   }	
}
?>