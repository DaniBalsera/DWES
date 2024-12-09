<?php
include('config.php'); // Incluye la configuración del sistema

session_start(); // Inicializa la sesión

// Inicializamos variables
$categoriaSeleccionada = isset($_POST['categoria']) ? $_POST['categoria'] : null; // Categoría seleccionada por el usuario
$mensaje = ""; // Mensaje para mostrar en la página

// Comprobar inicio de sesión
if (isset($_POST['inicioSesion'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    // Verifica las credenciales ingresadas con los datos del array de usuarios
    foreach ($usuarios as $usuario) {
        if ($usuario['nombre'] === $nombre && $usuario['pass'] === $pass) {
            $_SESSION['usuario'] = $usuario;
            $mensaje = "Inicio de sesión exitoso como {$usuario['nombre']} ({$usuario['rol']}).";
            break;
        }
    }

    if (!isset($_SESSION['usuario'])) {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}

// Cerrar sesión
if (isset($_POST['cerrarSesion'])) {
    session_destroy(); // Destruye la sesión
    header("Location: index.php"); // Redirige a la página de inicio
    exit;
}

// Gestión del carrito
$carrito = isset($_COOKIE['carrito']) ? json_decode($_COOKIE['carrito'], true) : []; // Recupera el carrito desde la cookie

if (isset($_POST['agregarCarrito'])) {
    $producto = $_POST['producto'];
    $tipo = isset($_POST['tamaño']) ? $_POST['tamaño'] : 'standard'; // 'standard' para bebidas y postres
    $precio = 0;

    // Encuentra el producto seleccionado y asigna su precio según su tipo
    foreach ($productos as $categoria => $items) {
        foreach ($items as $item) {
            if ($item['nombre'] === $producto) {
                if ($categoria === 'pizzas') {
                    // Asigna correctamente el precio según el tamaño
                    $precio = $item['precio'][$tipo];
                } else {
                    $precio = $item['precio'];
                }
                break 2;
            }
        }
    }

    $cantidad = isset($carrito[$producto][$tipo]) ? $carrito[$producto][$tipo] + 1 : 1;
    $carrito[$producto][$tipo] = $cantidad;
    setcookie('carrito', json_encode($carrito), time() + (86400 * 30)); // Cookie válida por 30 días
}

if (isset($_POST['vaciarCarrito'])) {
    setcookie('carrito', '', time() - 3600); // Expira la cookie
    $carrito = [];
}

// Tramitar Pedido
if (isset($_POST['tramitarPedido']) && !empty($carrito)) {
    $fechaHora = date('Ymd_His');
    $ticketFile = "ticket_{$fechaHora}.txt";
    $comandaFile = "comanda_{$fechaHora}_pendiente.txt";

    // Crear ticket de compra con cantidades y precios
    $ticketContent = "TICKET DE COMPRA\n\nProductos:\n";
    $total = 0;
    foreach ($carrito as $producto => $tipos) {
        foreach ($tipos as $tipo => $cantidad) {
            $precioUnitario = 0;
            foreach ($productos as $categoria => $items) {
                foreach ($items as $item) {
                    if ($item['nombre'] === $producto) {
                        if ($categoria === 'pizzas') {
                            // Correcto: utiliza un valor numérico para el precio
                            $precioUnitario = $item['precio'][$tipo];
                        } else {
                            $precioUnitario = $item['precio'];
                        }
                        $ticketContent .= "{$cantidad} x {$producto} {$tipo} - {$precioUnitario}€ cada uno\n";
                        $total += $precioUnitario * $cantidad;
                        break 3; // Sale de los bucles internos
                    }
                }
            }
        }
    }
    $ticketContent .= "\nTotal: {$total}€";
    file_put_contents($ticketFile, $ticketContent);

    // Crear comanda
    $comandaContent = "COMANDA PENDIENTE\n\nProductos:\n";
    foreach ($carrito as $producto => $tipos) {
        foreach ($tipos as $tipo => $cantidad) {
            $comandaContent .= "{$cantidad} x {$producto} {$tipo}\n";
        }
    }
    file_put_contents($comandaFile, $comandaContent);

    // Vaciar carrito
    setcookie('carrito', '', time() - 3600);
    $carrito = [];

    $mensaje = "Pedido tramitado. Descarga tu ticket: <a href='{$ticketFile}' download>Descargar Ticket</a>";
}

// Encontrar los 3 productos más comprados
$productosComprados = array_count_values(array_keys($carrito));
arsort($productosComprados);
$topProductos = array_slice($productosComprados, 0, 3, true);

// Opcional: obtener detalles de los productos más comprados
$productosMasCompradosDetalles = [];
foreach ($topProductos as $nombre => $cantidad) {
    foreach ($productos as $categoria => $items) {
        foreach ($items as $item) {
            if ($item['nombre'] === $nombre) {
                $productosMasCompradosDetalles[] = $item;
                break 3; // Sale de los bucles internos
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzería</title>
    <style>
        .producto {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .producto img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Pizzería</h1>
    <p><?php echo $mensaje; ?></p>

    <!-- Formulario de inicio de sesión -->
    <?php if (!isset($_SESSION['usuario'])): ?>
        <form action="" method="post">
            <h2>Iniciar sesión</h2>
            <label>Nombre: <input type="text" name="nombre" required></label><br>
            <label>Contraseña: <input type="password" name="pass" required></label><br>
            <input type="submit" name="inicioSesion" value="Iniciar sesión">
        </form>
    <?php else: ?>
        <form action="" method="post">
            <p>Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?>.</p>
            <input type="submit" name="cerrarSesion" value="Cerrar sesión">
        </form>
    <?php endif; ?>

    <!-- Formulario para seleccionar categoría -->
    <form action="" method="post">
        <h2>Selecciona una categoría</h2>
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="" disabled <?php echo is_null($categoriaSeleccionada) ? 'selected' : ''; ?>>Selecciona una categoría</option>
            <?php
            foreach (array_keys($productos) as $categoria) {
                $selected = ($categoriaSeleccionada === $categoria) ? 'selected' : '';
                echo "<option value='{$categoria}' {$selected}>{$categoria}</option>";
            }
            ?>
        </select>
    </form>

    <!-- Productos disponibles -->
    <div>
        <?php
        if ($categoriaSeleccionada) {
            foreach ($productos[$categoriaSeleccionada] as $producto) {
                echo "<div class='producto'>";
                echo "<img src='images/{$producto['imagen']}' alt='{$producto['nombre']}'>";
                echo "<p>{$producto['nombre']} - ";

                if ($categoriaSeleccionada === 'pizzas') {
                    // Mostrar opciones de tamaño para las pizzas
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='producto' value='{$producto['nombre']}'>";
                    echo "<label for='tamaño'>Tamaño:</label>";
                    echo "<select name='tamaño' id='tamaño'>";
                    foreach ($producto['precio'] as $tamaño => $precio) {
                        echo "<option value='{$tamaño}'>{$tamaño} - {$precio}€</option>";
                    }
                    echo "</select>";
                    echo "<input type='submit' name='agregarCarrito' value='Añadir al carrito'>";
                    echo "</form>";
                } else {
                    echo "{$producto['precio']}€</p>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='producto' value='{$producto['nombre']}'>";
                    echo "<input type='submit' name='agregarCarrito' value='Añadir al carrito'>";
                    echo "</form>";
                }

                echo "</div>";
            }
        }
        ?>
            <a href="gestion_comandas.php">
                <button type="button">Ir a comandas</button>
            </a>
    </div>

    <!-- Carrito -->
    <?php if (!empty($carrito)): ?>

        <h2>Carrito</h2>
        <ul>
            <?php
            foreach ($carrito as $producto => $tipos) {
                foreach ($tipos as $tamaño => $cantidad) {
                    echo "<li>{$cantidad} x {$producto} {$tamaño}</li>";
                }
            }
            ?>
        </ul>
        <form action="" method="post">

            <input type="submit" name="vaciarCarrito" value="Vaciar carrito">
            <input type="submit" name="tramitarPedido" value="Tramitar pedido">
        </form>
    <?php else: ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>

    <!-- Apartado de recomendaciones -->
    <footer>
        <h2>Productos más comprados</h2>
        <ul>
            <?php foreach ($productosMasCompradosDetalles as $producto): ?>
                <li class="producto">
                    <img src="images/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" width="50">
                    <?php echo $producto['nombre']; ?> - <?php
                    if (isset($producto['precio']['individual']) && isset($producto['precio']['media']) && isset($producto['precio']['familiar'])) {
                        echo "Individual - {$producto['precio']['individual']}€, Media - {$producto['precio']['media']}€, Familiar - {$producto['precio']['familiar']}€";
                    } else {
                        echo "{$producto['precio']}€";
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </footer>
</body>

</html>
