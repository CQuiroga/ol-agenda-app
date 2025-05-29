
# Agenda Contactos App

![](https://github.com/CQuiroga/ol-agenda-app/blob/main/Assets/Images/logo.png?raw=true)

![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)


##Descripcion

Aplicación que te permitirá gestionar tu lista de contactos, puedes ver, agregar, editar o eliminar los contactos de tu preferencia

##Tecnologías utilizadas

- Bootstrap 5
- PHP Version 8.3.20
- HTML 5
- Javascript
- SweetAlert 2
- MySQL

##Modo de uso

Clona este repositorio:

`git clone $https://github.com/CQuiroga/ol-agenda-app.git`

Accede al repositorio clonado "ol-agenda-app", 
cambia el nombre del archivo "Conexion _example.php" a "Conexion .php", editalo con los datos de tu base de datos, usuario, puerto y servidor:

`$baseDatos = '';`
	  `$servidor = '';`
      `$usuario = '';`
      `$pass = '';`
	  `$port = '';`

Algunos datos de muestra:
```html
CREATE TABLE `contactos` (
  `id` int NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO contactos (nombre, telefono, email) VALUES
('Carlos Pérez', '3111234567', 'carlos.perez@gmail.com'),
('Ana Torres', '3129876543', 'ana.torres@hotmail.com'),
('Luis Gómez', '3134567890', 'luis.gomez@yahoo.es'),
('María Rodríguez', '3142345678', 'maria.rodriguez@outlook.com'),
('José Martínez', '3158765432', 'jose.martinez@gmail.com'),
('Laura Herrera', '3161234987', 'laura.herrera@hotmail.com'),
('Juan Morales', '3174561230', 'juan.morales@yahoo.es'),
('Camila López', '3187654321', 'camila.lopez@outlook.com'),
('Pedro Ruiz', '3193456789', 'pedro.ruiz@gmail.com'),
('Diana Castro', '3102349876', 'diana.castro@hotmail.com'),
('Santiago Vargas', '3209876543', 'santiago.vargas@yahoo.es'),
('Valentina Ríos', '3212345670', 'valentina.rios@outlook.com'),
('Andrés Salazar', '3224567891', 'andres.salazar@gmail.com'),
('Natalia Mejía', '3236789012', 'natalia.mejia@hotmail.com'),
('Jorge Acosta', '3247890123', 'jorge.acosta@yahoo.es'),
('Daniela Pineda', '3258901234', 'daniela.pineda@outlook.com'),
('Felipe Navarro', '3269012345', 'felipe.navarro@gmail.com'),
('Isabella Gil', '3270123456', 'isabella.gil@hotmail.com'),
('Ricardo Quintero', '3281234567', 'ricardo.quintero@yahoo.es'),
('Lucía Mendoza', '3292345678', 'lucia.mendoza@outlook.com');
```
Crea al menos un usuario (de inicio de sesión):

```html
CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sesion_activa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;`

`
INSERT INTO `usuarios` (`id`, `email`, `password`, `sesion_activa`) VALUES
(1, 'mail@mail.com', 'c1ab9867cc5b473f74ac8d4b7abb401a', NULL),
(2, 'mail@mail.com', '123456', NULL);
```

Posteriormente, dirígete a tu navegador y digita:

`http://localhost/ol-agenda-app`
ó
`127.0.0.1/ol-agenda-app`

Deberás ver un inicio de sesión como este:

![](https://github.com/CQuiroga/ol-agenda-app/blob/main/Assets/Images/login.png?raw=true)

Usuario: mail@mail.com
Contraseña: myP4ss

Si los datos son incorrectos, la aplicación no te dejará ingresar:

![](https://github.com/CQuiroga/ol-agenda-app/blob/main/Assets/Images/login_incorrecto.png?raw=true)

Una vez iniciada la sesión, podrás ver tus contactos guardados (o precargados):

![](https://github.com/CQuiroga/ol-agenda-app/blob/main/Assets/Images/agenda.png?raw=true)

desde los botones "Ver", "Editar" o "Eliminar", podrás gestionar tus contactos según tus necesidades:

![](https://github.com/CQuiroga/ol-agenda-app/blob/main/Assets/Images/editar.png?raw=true)

### Estructura de la Aplicación

olagenda-app/
├── Actions/
│   └── Crud_Contacto.php
├── Assets/
│   ├── Css/
│   │   └── style.css
│   ├── Images/
│   │   ├── agenda.png
│   │   ├── editar.png
│   │   ├── login_incorrecto.png
│   │   ├── login.png
│   │   └── logo.png
│   └── Js/
│       ├── crudContacto.js
│       └── login.js
├── Auth/
│   ├── login.php
│   └── loginForm.php
├── Config/
│   ├── Conexion_example.php
│   └── Conexion.php
├── Controllers/
│   └── AgendaController.php
├── Home/
│   └── Views/
│       └── Layout/
│           └── Agenda.php
├── Models/
│   └── Contacto.php
├── .gitignore
├── index.php
├── LICENSE
├── logout.php
└── README.md

[Disfrutala!](http://localhost/ol-agenda-app "link title")


