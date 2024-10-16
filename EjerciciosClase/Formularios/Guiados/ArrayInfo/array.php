<?php
// Verificar si el formulario ha sido enviado usando el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Crear un array para almacenar los datos enviados por el formulario.
    // Las claves son los mismos nombres de los campos que usamos en el formulario (convertidos a minúsculas).
    $datos_personales = [
        'nombre' => $_POST['nombre'],       // Aquí recogemos el dato del campo 'nombre'
        'apellido' => $_POST['apellido'],   // Recogemos el dato del campo 'apellido'
        'edad' => $_POST['edad'],           // Recogemos el dato del campo 'edad'
        'email' => $_POST['email'],         // Recogemos el dato del campo 'email'
        'teléfono' => $_POST['teléfono']    // Recogemos el dato del campo 'teléfono'
    ];

    // Mostrar los datos que fueron recibidos en una lista ordenada
    echo "<h1>Datos recibidos</h1>";
    echo "<ul>";
    foreach ($datos_personales as $campo => $valor) {
        // Para cada campo recibido, mostramos el nombre del campo (con la primera letra en mayúscula)
        // y el valor que ingresó el usuario (aplicamos htmlspecialchars para evitar vulnerabilidades de inyección de código).
        echo "<li><strong>" . ucfirst($campo) . ":</strong> " . htmlspecialchars($valor) . "</li>";
    }
    echo "</ul>";
} else {
    // Si no se ha enviado el formulario correctamente, mostramos un mensaje de error.
    echo "No se han recibido datos.";
}
