<?php

$cart = false;

if(!empty($_SESSION["usuario"])){
    $cart = true;
};

$navbar = [
    "inicio" => ["nombre" => "Inicio", "visible" => true],
    "galeria" => ["nombre" => "Galería", "visible" => true],
    "tienda" => ["nombre" => "Tienda", "visible" => true],
    "carrito" => ["nombre" => "Carrito", "visible" => $cart],
    "contacto" => ["nombre" => "Contacto", "visible" => true],
    "informacion" => ["nombre" => "Información", "visible" => false],
    "pago" => ["nombre" => "Pago", "visible" => false],
    "registro" => ["nombre" => "Registro", "visible" => false],
    "login" => ["nombre" => "Login", "visible" => false],
];

$navbar2 = [
    "remeras" => ["nombre" => "Remeras", "visible" => true],
    "usuarios" => ["nombre" => "Usuarios", "visible" => true],
    "crear_remera" => ["nombre" => "Crear Remera", "visible" => false],
    "editar_remera" => ["nombre" => "Editar", "visible" => false],
    "editar_usuario" => ["nombre" =>"editar_usuario", "visible" => false],
    "crear_usuario" => ["nombre" =>"crear_usuario", "visible" => false],
];

$links = [
    "registro" => ["nombre" => "Registro", "visible" => true],
    "login" => ["nombre" => "Login", "visible" => true]
];

$temporadas = array(
    ["Temporada 1", "24", "Friends_Temporada_1.jpg"],
    ["Temporada 2", "24", "Friends_Temporada_2.jpg"],
    ["Temporada 3", "25", "Friends_Temporada_3.jpg"],
    ["Temporada 4", "24", "Friends_Temporada_4.jpg"],
    ["Temporada 5", "24", "Friends_Temporada_5.jpg"],
    ["Temporada 6", "25", "Friends_Temporada_6.jpg"],
    ["Temporada 7", "24", "Friends_Temporada_7.jpg"],
    ["Temporada 8", "24", "Friends_Temporada_8.jpg"],
    ["Temporada 9", "24", "Friends_Temporada_9.jpg"],
    ["Temporada 10", "18", "Friends_Temporada_10.jpg"]
);

$errores = [
    "registro" => [
        "campos_obligatorios" => "Los campos email y contraseña son obligatorios",
        "registrarse" => "No se pudo registrar su usuario"
    ],
    "login" => [
        "registro_ok" => "¡Felicidades te registraste correctamente!",
        "campos_obligatorios" => "Los campos usuario/email y contraseña son obligatorios",
        "datos_incorrectos" => "Los datos ingresados son incorrectos"
    ],
    "inicio" => [
        "bienvenido" => "Bienvenido, gracias por ingresar",
        "401" => "No es posible acceder a esta sección"
    ],
    "tienda" => [
        "sin_session" => "Para ver tu carrito de compras hay que estar logueado",
        "carrito_vacio" => "El carrito de compras está vacío",
        "no_encontrado" => "No se encontró el producto buscado o no existe",
        "agregado" => "¡La remera fue agregada al carrito con éxito!",
        "401" => "No puede acceder a esta sección",
        "compra_exitosa" => "¡Su compra se realizó con éxito! Gracias",
    ],
    "carrito" => [
        "remera_borrada" => "Se eliminó la remera del carrito",
        "sin_acceso" => "Sólo puede ingresar a la sección de pago por medio del botón 'Ir a pagar'",
        "datos_obligatorios" => "No puede haber ningún dato faltante",
        "dato_invalido_direccion_min_length" => "La dirección no puede tener menos de 3 letras",
        "dato_invalido_ciudad" => "Se ingresó un dato invalido en el campo 'Ciudad'",
        "dato_invalido_ciudad_min_length" => "La ciudad no puede tener menos de 3 letras",
        "dato_invalido_codigo_postal" => "Se ingresó un dato invalido en el campo 'Código postal'",
        "dato_invalido_codigo_postal_max_length" => "El código postal NO puede ser mayor a 4 dígitos",
        "dato_invalido_numero_tarjeta_max_length" => "El número de tarjeta NO puede ser mayor a 19 dígitos",
        "dato_invalido_numero_tarjeta" => "Se ingresó un dato invalido en el campo 'Número de tarjeta'",
        "dato_invalido_codigo_seguridad" => "Se ingresó un dato invalido en el campo 'Código de seguridad'",
        "dato_invalido_codigo_seguridad_max_length" => "El código de seguridad de la tarjeta NO puede ser mayor a 4 dígitos",
        "dato_invalido_titular_tarjeta" => "Se ingresó un dato invalido en el campo 'Nombre del titular de la tarjeta'",
        "dato_invalido_titular_tarjeta_min_length" => "El nombre no puede ser menor a 3 letras",
    ],
    "contacto" => [
        "nombre_vacio" => "El nombre no puede estar vacío",
        "nombre_invalido" => "Se ingresó un nombre inválido",
        "nombre_min_length" => "El nombre no puede tener menos de 3 letras",
        "apellido_vacio" => "El apellido no puede estar vacío",
        "apellido_invalido" => "Se ingresó un apellido inválido",
        "apellido_min_length" => "El apellido no puede tener menos de 3 letras",
        "email_vacio" => "El email no puede estar vacío",
        "email_invalido" => "Se ingresó un email inválido",
        "comentario_vacio" => "El mensaje no puede estar vacío",
        "comentario_min_length" => "El mensaje no puede tener menos de 5 caracteres",
        "formulario_enviado" => "¡Gracias, el formulario se envió con éxito!",
    ],
];


$errores_panel = [
    "remeras" => [
        "bienvenido" => "Bienvenido al Panel de Control",
        "remera_creada" => "Se creó con éxito la remera",
        "remera_editada" => "Se editó con éxito la remera",
        "remera_borrada" => "Se borró con éxito la remera",
        "remera_no_borrada" => "No se pudo borrar la remera",
        "401" => "El usuario Administrador sólo puede acceder a la sección del CRUD",
        "no_encontrado" => "No se encontró el producto que se quiere editar o no existe",
    ],
    "usuarios" => [
        "usuario_creado" => "El usuario ha sido creado correctamente",
        "usuario_borrado" => "Se borró el usuario correctamente",
        "usuario_no_borrado" => "No se pudo borrar al usuario",
        "registrarse" => "No se pudo registrar su usuario",
        "usuario_editado" => "El usuario ha sido editado correctamente",
        "no_encontrado" => "No se encontró el usuario que se quiere editar o no existe",
    ],         
    "crear_remera" => [
        "campos_obligatorios" => "No puede faltar ningun dato",
        "img_invalida" => "La imagen debe ser JPG/JPEG",
        "img_peso_maximo" => "La imagen no puede pesar más de 2MB",
        "remera_no_creada" => "No se ha podido crear la remera",
        "remera_ya_existente" => "Ya hay una remera con el mismo nombre",
    ],
    "crear_usuario" => [
        "datos_minimos" => "El email y/o la contraseña deben ser obligatorios",
        "email_ya_existente" => "El email ya existe",
        "usuario_ya_existente" => "El nombre de usuario ya se encuentra en uso, probá otro",
    ],
    "editar_remera" => [
        "campos_obligatorios" => "No puede faltar ningun dato",
        "img_invalida" => "La imagen debe ser JPG/JPEG",
        "img_peso_maximo" => "La imagen no puede pesar más de 2MB",
        "no_editado" => "Remera no editada",
    ],
    "editar_usuario" => [
        "campos_obligatorios" => "El email y el usuario son obligatorios",
        "usuario_no_editado" => "No se pudo editar el usuario",
        "usuario_ya_existente" => "El nombre de usuario ya se encuentra en uso, probá otro",
    ],        
];