function crearContacto(nombre, telefono, email, estado) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: `Crear contacto <strong class="text-info">${nombre}</strong>`,
        html: `
            <form id="formCrearContacto">
                <table class="table table-bordered table-hover text-secondary">
                    <tbody>

                        <tr>
                            <th class="text-secondary">Nombre:</th>
                            <td class="text-secondary">
                                <input type="text" id="nombre" class="form-control text-secondary" value="">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Teléfono:</th>
                            <td class="text-secondary">
                                <input type="text" id="telefono" class="form-control text-secondary" value="">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Email:</th>
                            <td class="text-secondary">
                                <input type="text" id="email" class="form-control text-secondary" value="">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Estado:</th>
                            <td class="text-secondary">Activo</td>
                        </tr>
                    </tbody>
                </table>
            </form>`,
        icon: "info",
        showCancelButton: true,
        confirmButtonText: `Crear!`,
        cancelButtonText: " No, cancelar! ",
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            const nombreCreado = $('#nombre').val();
            const telefonoCreado = $('#telefono').val();
            const emailCreado = $('#email').val();

            $.ajax({
                url: '../../Controllers/AgendaController.php',
                method: 'POST',
                data: {
                    nombre: nombreCreado,
                    telefono: telefonoCreado,
                    email: emailCreado,
                    estado: 1,
                    accion: 'crear'
                },
                dataType: 'json',
                success: function(response) {
                    console.log("✅ Respuesta :", response);

                    if (response.success == "1") {
                        const contacto = response.contacto;

                        swalWithBootstrapButtons.fire({
                            title: "Creado!",
                            text: `Tu contacto ${contacto.nombre}, ha sido creado.`,
                            icon: "success"
                        });

                        const nuevaFila = `
                            <tr id="fila-contacto-${contacto.id}">
                                <td class="text-center nombre">${contacto.nombre}</td>
                                <td class="text-center telefono">${contacto.telefono}</td>
                                <td class="text-center email">${contacto.email}</td>
                                <td class="text-center">
                                    <a class="btn btn-info text-white btn-sm" href="#" onclick="verContacto(
                                        \`${contacto.id}\`,
                                        \`${contacto.nombre}\`,
                                        \`${contacto.telefono}\`,
                                        \`${contacto.email}\`,
                                        \`${contacto.estado}\`
                                    )">
                                        <i class="lar la-eye"></i> <span class="info">Ver</span>
                                    </a>
                                    <a class="btn btn-secondary text-white btn-sm" href="#" onclick="editarContacto(
                                        \`${contacto.id}\`,
                                        \`${contacto.nombre}\`,
                                        \`${contacto.telefono}\`,
                                        \`${contacto.email}\`,
                                        \`${contacto.estado}\`
                                    )">
                                        <i class="las la-pencil-alt"></i> <span class="info">Editar</span>
                                    </a>
                                    <a class="btn btn-danger text-white btn-sm" href="#" onclick="eliminarContacto(
                                        \`${contacto.id}\`,
                                        \`${contacto.nombre}\`
                                    )">
                                        <i class="las la-trash-alt"></i> <span class="info">Eliminar</span>
                                    </a>
                                </td>
                            </tr>
                            `;

                            $('table tbody').prepend(nuevaFila); // Mostrar al principio
                    }
                    else if (response.success == "2") {
                        swalWithBootstrapButtons.fire({
                            title: "Error!",
                            text: "Error de conexión!",
                            icon: "error"
                        });
                    }
                    else {
                        swalWithBootstrapButtons.fire({
                            title: "Error!",
                            text: "Datos incorrectos!",
                            icon: "error"
                        });
                    }
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelado!",
                text: "Has cancelado la edición",
                icon: "error"
            });
        }
    });
}

function verContacto(idContacto, nombre, telefono, email, estado) {
            Swal.fire({
            title: `Detalle de <strong class="text-info">${nombre}</strong>`,
            html: `
            <table class="table table-bordered table-hover text-secondary">
                <tbody>
                    <tr>
                    <th class="text-secondary">Id:</th>
                    <td class="text-secondary">${idContacto}</td>
                    </tr>
                    <tr>
                    <th class="text-secondary">Nombre:</th>
                    <td class="text-secondary">${nombre}</td>
                    </tr>
                    <tr>
                    <th class="text-secondary">Telefono:</th>
                    <td class="text-secondary">${telefono}</td>
                    </tr>
                    <tr>
                    <th class="text-secondary">Email:</th>
                    <td class="text-secondary">${email}</td>
                    </tr>
                    <tr>
                    <th class="text-secondary">Estado:</th>
                    <td class="text-secondary">${estado== 1 ? 'Activo' : 'Inactivo'}</td>
                    </tr>
                </tbody>
            </table>`,
            icon: "info",
            });
        }

function editarContacto(idContacto, nombre, telefono, email, estado) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: `Editar <strong class="text-info">${nombre}</strong>`,
        html: `
            <form id="formEditarContacto">
                <table class="table table-bordered table-hover text-secondary">
                    <tbody>
                        <tr>
                            <th class="text-secondary">Id:</th>
                            <td class="text-secondary"><span id="contactoId">${idContacto}</span></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Nombre:</th>
                            <td class="text-secondary">
                                <input type="text" id="nombre" class="form-control text-secondary" value="${nombre}">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Teléfono:</th>
                            <td class="text-secondary">
                                <input type="text" id="telefono" class="form-control text-secondary" value="${telefono}">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Email:</th>
                            <td class="text-secondary">
                                <input type="text" id="email" class="form-control text-secondary" value="${email}">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Estado:</th>
                            <td class="text-secondary">${estado == 1 ? 'Activo' : 'Inactivo'}</td>
                        </tr>
                    </tbody>
                </table>
            </form>`,
        icon: "info",
        showCancelButton: true,
        confirmButtonText: `Editar!`,
        cancelButtonText: " No, cancelar! ",
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            const nombreEditado = $('#nombre').val();
            const telefonoEditado = $('#telefono').val();
            const emailEditado = $('#email').val();

            $.ajax({
                url: '../../Controllers/AgendaController.php',
                method: 'POST',
                data: {
                    id: idContacto,
                    nombre: nombreEditado,
                    telefono: telefonoEditado,
                    email: emailEditado,
                    accion: 'editar'
                },
                dataType: 'json',
                success: function(response) {
                console.log("✅ Respuesta :", response);

                if (response.success == "1") {
                    
                    swalWithBootstrapButtons.fire({
                        title: "Editado!",
                        text: "Tu contacto ha sido editado.",
                        icon: "success"
                    });
                    const fila = $(`#fila-contacto-${idContacto}`);
                    fila.find('.nombre').text(nombreEditado);
                    fila.find('.telefono').text(telefonoEditado);
                    fila.find('.email').text(emailEditado);
                }
                else if (response.success == "2") {
                    swalWithBootstrapButtons.fire({
                        title: "Error!",
                        text: "Error de conexión!",
                        icon: "error"
                    });
                }
                else {
                    swalWithBootstrapButtons.fire({
                        title: "Error!",
                        text: "Datos incorrectos!",
                        icon: "error"
                    });
                }
            }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelado!",
                text: "Has cancelado la edición",
                icon: "error"
            });
        }
    });
}

function eliminarContacto(idContacto, nombre) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Eliminar Contacto',
        html: `Estas seguro de eliminar <strong class="text-info">${nombre}</strong> ?`,
        icon: "info",
        showCancelButton: true,
        confirmButtonText: `Eliminar!`,
        cancelButtonText: " No, cancelar! ",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../../Controllers/AgendaController.php',
                method: 'POST',
                data: {
                    id: idContacto,
                    accion: 'eliminar'
                },
                dataType: 'json',
                success: function(response) {
                console.log("✅ Respuesta :", response);

                if (response.success == "1") {
                    
                    swalWithBootstrapButtons.fire({
                        title: "Eliminado!",
                        text: `Tu contacto ${nombre}, ha sido eliminado`,
                        icon: "success"
                    });
                    $(`#fila-contacto-${idContacto}`).remove();
                }
                else if (response.success == "2") {
                    swalWithBootstrapButtons.fire({
                        title: "Error!",
                        text: "Error de conexión!",
                        icon: "error"
                    });
                }
                else {
                    swalWithBootstrapButtons.fire({
                        title: "Error!",
                        text: "Datos incorrectos!",
                        icon: "error"
                    });
                }
            }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelado!",
                text: "Has cancelado la eliminación",
                icon: "error"
            });
        }
    });
}
