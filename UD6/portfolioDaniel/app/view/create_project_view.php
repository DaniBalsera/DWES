<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
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
        <h1>Crear Proyecto</h1>
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="errors">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="../create-project" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título del Proyecto" value="<?php echo isset($titulo) ? htmlspecialchars($titulo) : ''; ?>">
            <input type="text" name="descripcion" placeholder="Descripción del Proyecto" value="<?php echo isset($descripcion) ? htmlspecialchars($descripcion) : ''; ?>">
            <input type="text" name="tecnologias" placeholder="Tecnologías Utilizadas" value="<?php echo isset($tecnologias) ? htmlspecialchars($tecnologias) : ''; ?>">
            <input type="file" name="logo" id="logo">
            <button type="submit">Crear Proyecto</button>
        </form>
    </div>
</body>
</html>