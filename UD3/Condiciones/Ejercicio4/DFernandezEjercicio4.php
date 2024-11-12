<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylePortFolio.css">
</head>
<body> 


<?php
// Creamos las variables necesarias para trabajar

// Primero obtenemos la fecha actual
$fechaActual = date("y-m-d");
$añoActual = date("y");
// Creamos una variable para el siguiente año en caso de que estemos en la estación de invierno
$añoActualSiguiente = $añoActual + 1;

// Creamos las variables de inicio y fin de cada estación
$primaveraInicio = "$añoActual-03-21";
$primaveraFin  = "$añoActual-06-20";

$VeranoInicio = "$añoActual-06-21";
$VeranoFin  = "$añoActual-09-22";

$OtoñoInicio = "$añoActual-09-23";
$OtoñoFin  = "$añoActual-12-21";

$InviernoInicio = "$añoActual-12-22";
$InviernoFin  = "$añoActualSiguiente-03-20";

// Creamos las condiciones que mostrarán la imagen según la estación
if ($fechaActual >= $primaveraInicio && $fechaActual <= $primaveraFin) {
    $imagenEstacion = "Primavera.jpg";
    
} elseif ($fechaActual >= $OtoñoInicio && $fechaActual <= $OtoñoFin) {
    $imagenEstacion = "Otoño.jpg";
 
} elseif ($fechaActual >= $InviernoInicio && $fechaActual <= $InviernoFin) {
    $imagenEstacion= "Invierno.png";
    
} elseif ($fechaActual >= $VeranoInicio && $fechaActual <= $VeranoFin) {
    $imagenEstacion= "Verano.jpg";
   
}

// Obtener la hora actual
date_default_timezone_set('Europe/Madrid');
$hora = date("H"); // Formato 24 horas (00-23)




// Establecer el color de fondo y color del texto según la hora
// El color texto varía segun el color de fondo
switch ($hora) {
    case "00": 
        
        // Gris oscuro
        $color = "#2E2E2E"; 
        $texto = "#FFFFFF"; 
        break;
    case "01":

        // Rojo sutil
        $color = "#D9534F"; 
        $texto = "#FFFFFF"; 
        break;
    case "02":

        // Naranja sutil
        $color = "#F0AD4E"; 
        $texto = "#000000"; 
        break;
    case "03":

        // Amarillo sutil
        $color = "#F0E68C"; 
        $texto = "#000000"; 
        break;
    case "04":

        // Verde claro
        $color = "#5CB85C"; 
        $texto = "#000000"; 
        break;
    case "05":

        // Verde agua
        $color = "#5BC0DE"; 
        $texto = "#000000";
        break;
    case "06":

        // Azul
        $color = "#337AB7"; 
        $texto = "#FFFFFF"; 
        break;
    case "07":

        // Azul claro
        $color = "#5C5CFF"; 
        $texto = "#FFFFFF"; 
        break;
    case "08":

        // Amarillo suave
        $color = "#7F7F00"; 
        $texto = "#FFFFFF"; 
        break;
    case "09":

        // Azul violeta
        $color = "#6A5ACD"; 
        $texto = "#FFFFFF"; 
        break;
    case "10":

        // Violeta
        $color = "#9370DB"; 
        $texto = "#FFFFFF"; 
        break;
    case "11":

        // Magenta
        $color = "#DDA0DD"; 
        $texto = "#FFFFFF"; 
        break;
    case "12":

        // Rosa
        $color = "#FF69B4"; 
        $texto = "#000000"; 
        break;
    case "13":

        // Rojo claro
        $color = "#FFB6C1"; 
        $texto = "#000000"; 
        break;
    case "14":

        // Naranja claro
        $color = "#FFE4B5"; 
        $texto = "#000000"; 
        break;
    case "15":

        // Amarillo claro
        $color = "#FFFACD"; 
        $texto = "#000000"; 
        break;
    case "16":

        // Verde oscuro
        $color = "#98FB98"; 
        $texto = "#000000"; 
        break;
    case "17":

        // Verde agua oscuro
        $color = "#AFEEEE"; 
        $texto = "#000000"; 
        break;
    case "18":

        // Azul claro oscuro
        $color = "#ADD8E6"; 
        $texto = "#000000"; 
        break;
    case "19":

        // Azul oscuro
        $color = "#6495ED";
        $texto = "#FFFFFF"; 
        break;
    case "20":

        // Violeta claro
        $color = "#BA55D3"; 
        $texto = "#FFFFFF"; 
        break;
    case "21":

        // Magenta claro
        $color = "#FF69B4"; 
        $texto = "#FFFFFF"; 
        break;
    case "22":

        // Rosa claro
        $color = "#FFB5C5"; 
        $texto = "#000000"; 
        break;
    case "23":

        // Gris oscuro
        $color = "#A9A9A9"; 
        $texto = "#FFFFFF"; 
        break;
    default:

        // Blanco
        $color = "#FFFFFF"; 
        $texto = "#000000";
        break;
}

?>

<header>

</header>


<div class="div1">


<table class="tabla1">
  <thead>
    <tr>
      <th>Nombre y apellidos</th>
      <th>Edad</th>
      <th>Curso</th>
      <th>Asignatura</th>
    </tr>
  </thead>
  <tbody class="tbody1">
    <tr>
      <td>Daniel Fernández Balsera</td>
      <td>24</td>
      <td>2 DAW</td>
      <td>Desarrollo web en entornos de Servidor</td>
    </tr>
  </tbody>
</table>
</div>

<h1 class="tituloP">MI PORTFOLIO</h1>
 <img src="foto portfolio.jpg" alt="" class="img1">

<div class="div2">
  <h3 id="skills" class="hb"> Habilidades </h3>
  <ul>
    <li>Manejo de sistemas de gestión empresarial</li>
    <li>Administración de servidores Linux</li>
    <li>Desarrollo de aplicaciones móviles en Android Studio</li>
    <li>Reparación de equipos</li>
    <li>Administración de bases de datos</li>
    <br>
    <a href='https://github.com/DaniBalsera/PracticasDServicios/blob/main/UD3/Condiciones/Ejercicio4/DFernandezEjercicio4.php' target='_blank' style="color: white">Enlace a repositorio en github</a>
  </ul>
 
</div>



</body>

<!-- He creado un apartado de estilos aqui para asociar las variables $color, $texto y $imagenEstacion !-->
<style>
        body {
            background-color: <?php echo $color; ?>; 
            color: <?php echo $texto; ?>;
            background: linear-gradient(to right, #FFF, <?php echo $color; ?>, <?php echo $color; ?>, #FFF);
           
        }

        header {
            background-image: url(<?php echo $imagenEstacion; ?>);
            height: 100px;
            background-repeat: no-repeat;
            width: 100vw; 
            background-position: center;
            display: flex;
        }
    </style>

</html>
