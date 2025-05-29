<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_DEPRECATED);

$root = $_SERVER['DOCUMENT_ROOT'] . '/ol-agenda-app';

/* ======================================================
   === Incluye el modelo y sus manejadores (CRUDS) === */

   require_once $root . '/Models/Contacto.php';
   require_once $root . '/Actions/Crud_Contacto.php';

/* ======================================================
   ========= Instancia modelo y sus manejadores ====== */

   $crud = new CrudContacto();
   $contacto = new Contacto();

   $listaContactos = $crud->listarTodo();
?>

<div class="card-body p-4">
    <a href="#" class="form-group btn btn-success text-white mb-4" onclick="crearContacto(`<?php echo $contacto->getNombre(); ?>`,
            `<?php echo $contacto->getTelefono(); ?>`,
            `<?php echo $contacto->getEmail(); ?>`,
            `<?php echo $contacto->getEstado(); ?>`)">
        <i class="las la-user-plus"></i> Agregar Contacto
    </a>
<table class="table table-striped table-hover table-responsive">
   <thead class="thead-dark">
    <tr class="Head_Tablas">
	  <th class="text-center">Nombre</th>
      <th class="text-center">Teléfono</th>
      <th class="text-center">Email</th>
      <th class="text-center">Acciones</th>
   
	</thead>		
	 <tbody>
      <?php foreach ($listaContactos as $contacto): ?>
        <tr id="fila-contacto-<?php echo $contacto->getIdContacto(); ?>">
          <td class="text-center nombre"><?php echo $contacto->getNombre(); ?></td>
          <td class="text-center telefono"><?php echo $contacto->getTelefono(); ?></td>
          <td class="text-center email"><?php echo $contacto->getEmail(); ?></td>
          <td class="text-center">
            <a class="btn btn-info text-white btn-sm" href="#" onclick="verContacto(`<?php echo $contacto->getIdContacto(); ?>`,
            `<?php echo $contacto->getNombre(); ?>`,
            `<?php echo $contacto->getTelefono(); ?>`,
            `<?php echo $contacto->getEmail(); ?>`,
            `<?php echo $contacto->getEstado(); ?>`)">

              <i class="lar la-eye"></i>
              <span class="info" >Ver</span>
            </a>
            <a class="btn btn-secondary text-white btn-sm" href="#" onclick="editarContacto(`<?php echo $contacto->getIdContacto(); ?>`,
            `<?php echo $contacto->getNombre(); ?>`,
            `<?php echo $contacto->getTelefono(); ?>`,
            `<?php echo $contacto->getEmail(); ?>`,
            `<?php echo $contacto->getEstado(); ?>`)">
              <i class="las la-pencil-alt"></i>
              <span class="info" >Editar</span>
            </a>
            <a class="btn btn-danger text-white btn-sm" href="#" onClick="eliminarContacto(`<?php echo $contacto->getIdContacto(); ?>`,
            `<?php echo $contacto->getNombre(); ?>`)">
              <i class="las la-trash-alt"></i>
              <span class="info" >Eliminar</span>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>

</div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../../Assets/Js/crudContacto.js"></script>
