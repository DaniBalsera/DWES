<?php
require_once 'conf/conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grupo = $_POST['grupo'];
    $archivo = $_FILES['archivo'];

    // Validar el archivo
    if ($archivo['size'] > MAXSIZE) {
        die("El archivo es demasiado grande.");
    }

    $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedExt)) {
        die("Extensión de archivo no permitida.");
    }

    if (!in_array($archivo['type'], $allowedFormat)) {
        die("Formato de archivo no permitido.");
    }

    // Mover el archivo al directorio de subida
    $rutaArchivo = DIRUPLOAD . basename($archivo['name']);
    if (!move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
        die("Error al subir el archivo.");
    }

    // Procesar el archivo CSV
    $usuarios = [];
    if (($handle = fopen($rutaArchivo, "r")) !== FALSE) {
        $linea = 0;
        while (($datos = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($linea >= LINECABECERA) {
                if (isset($datos[0])) {
                    $nombreCompleto = str_replace($caracteres, $caracteresReemplazar, $datos[0]);
                    $partes = explode(' ', $nombreCompleto);
                    if (count($partes) >= 3) {
                        $apellido1 = $partes[0];
                        $apellido2 = $partes[1];
                        $nombre = $partes[2];
                        $usuario = strtoupper(substr($apellido1, 0, 2)) . strtolower(substr($apellido2, 0, 2)) . strtolower(substr($nombre, 0, 1)) . "_1daw";
                        $bd = "bd" . strtoupper(substr($apellido1, 0, 2)) . strtolower(substr($apellido2, 0, 2)) . strtolower(substr($nombre, 0, 1)) . "_1daw";
                        $usuarios[] = [
                            'usuario' => $usuario,
                            'bd' => $bd
                        ];
                    } else {
                        echo "Error: Fila $linea no tiene suficientes partes en el nombre.<br>";
                    }
                } else {
                    echo "Error: Fila $linea no tiene suficientes columnas.<br>";
                }
            }
            $linea++;
        }
        fclose($handle);
    }

    // Generar el script SQL
    $script = "";
    foreach ($usuarios as $usuario) {
        $script .= "CREATE DATABASE {$usuario['bd']};\n";
        $script .= "GRANT ALL PRIVILEGES ON {$usuario['bd']}.* TO '{$usuario['usuario']}'@'localhost' IDENTIFIED BY 'clave';\n";
    }

    // Guardar el script en un archivo
    $rutaScript = DIRUPLOAD . "script.sql";
    file_put_contents($rutaScript, $script);

    // Redirigir a test2.php para mostrar el resultado
    header("Location: test2.php?script=" . urlencode($rutaScript));
    exit;
}
?>