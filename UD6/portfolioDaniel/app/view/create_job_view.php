<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Trabajo</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">
    <style>
        .errors {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
<?php include 'includes/header.php'; ?>
    <div class="container">
        <h1>Crear Trabajo</h1>
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="errors">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="../create-job">
            <input type="text" name="titulo" placeholder="Título del Trabajo" value="<?php echo isset($titulo) ? htmlspecialchars($titulo) : ''; ?>">
            <textarea name="descripcion" placeholder="Descripción del Trabajo"><?php echo isset($descripcion) ? htmlspecialchars($descripcion) : ''; ?></textarea>
            <input type="date" name="fecha_inicio" placeholder="Fecha de Inicio" value="<?php echo isset($fecha_inicio) ? htmlspecialchars($fecha_inicio) : ''; ?>">
            <input type="date" name="fecha_final" placeholder="Fecha de Finalización" value="<?php echo isset($fecha_final) ? htmlspecialchars($fecha_final) : ''; ?>">
            <button type="submit">Crear Trabajo</button>
        </form>
    </div>
</body>
</html>