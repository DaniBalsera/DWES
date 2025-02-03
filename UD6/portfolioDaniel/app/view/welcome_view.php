<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/css/style.css">
</head>

<body>

    <div class="container">
        <?php include 'includes/header.php';  ?>

        <?php if (isset($_SESSION['nombre'])): ?>
            <div class="profile">
                <img src="<?php echo htmlspecialchars($_SESSION['foto']); ?>" alt="Foto de perfil">
                <h4>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h4>
            </div>
        <?php else: ?>
            <h4>Bienvenido Invitado</h4>
        <?php endif; ?>

        <?php if (isset($portfolio) && !empty(array_filter($portfolio))): ?>
            <div class="card">
                <h2>Portfolio de <?php echo htmlspecialchars($_SESSION['nombre']); ?></h2>
                <div class="section-title">
                    Proyectos
                    <a href="proyecto/crear" class="add-button">+</a>
                </div>
                <article class="contenedorCategoria">

                    <?php if (!empty($portfolio['proyectos'])): ?>
                        <?php foreach ($portfolio['proyectos'] as $proyecto): ?>
                            <div class="project">
                                <p class="project-title"><?php echo htmlspecialchars($proyecto['proyecto_titulo']); ?></p>
                                <img src="<?php echo htmlspecialchars($proyecto['proyecto_logo']); ?>" alt="Logo del proyecto" id="project-logo">
                                <p class="project-description">Descripción: <?php echo htmlspecialchars($proyecto['proyecto_descripcion']); ?></p>
                                <p class="project-technologies">Tecnologías: <?php echo htmlspecialchars($proyecto['proyecto_tecnologias']); ?></p>
                                <a href="proyecto/editar/<?php echo $proyecto['id_p']; ?>" width="10px"><img width="45px" src="<?php echo BASE_URL ?>/css/editar.png" alt="" id="logoEditar"></a>
                                <a href="proyecto/eliminar/<?php echo $proyecto['id_p']; ?>">Eliminar </a>                        
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay proyectos</p>
                    <?php endif; ?>
                </article>
                <div class="section-title">
                    Redes Sociales
                    <a href="social/crear" class="add-button">+</a>
                </div>
                <article class="contenedorCategoria">
                <?php if (!empty($portfolio['redes_sociales'])): ?>
                    <?php foreach ($portfolio['redes_sociales'] as $red_social): ?>
                        <div class="social">
                            <p class="social-title"><?php echo htmlspecialchars($red_social['redes_sociales']); ?></p>
                            <p class="social-url enlacesRedes">URL: <a href="<?php echo htmlspecialchars($red_social['url']); ?>"><?php echo htmlspecialchars($red_social['url']); ?></a></p>
                            <a href="social/editar/<?php echo $red_social['id_s']; ?>" width="10px"><img width="45px" src="<?php echo BASE_URL ?>/css/editar.png" alt="" id="logoEditar"></a>
                            <a href="social/eliminar/<?php echo $red_social['id_s']; ?>">Eliminar </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay redes sociales</p>
                <?php endif; ?>
                </article>
                <div class="section-title">
                    Skills
                    <a href="skill/crear" class="add-button">+</a>

                </div>
        
                <?php if (!empty($portfolio['skills'])): ?>
                    <?php foreach ($portfolio['skills'] as $skill): ?>
                        <ul class="skill">
                            <li class="skill-name"><?php echo htmlspecialchars($skill['habilidades']); ?></li>
                            
                        </ul>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay habilidades</p>
                <?php endif; ?>
                </article>
                <div class="section-title">
                    Trabajos
                    <a href="trabajo/crear" class="add-button">+</a>
                </div>
                <article class="contenedorCategoria">
                
                <?php if (!empty($portfolio['trabajos'])): ?>
                    <?php foreach ($portfolio['trabajos'] as $trabajo): ?>
                        <div class="job-row">
                            <p class="job-title"><?php echo htmlspecialchars($trabajo['trabajo_titulo']); ?></p>
                            <p class="job-description">Descripción: <?php echo htmlspecialchars($trabajo['trabajo_descripcion']); ?></p>
                            <p class="job-start-date">Fecha de Inicio: <?php echo htmlspecialchars($trabajo['trabajo_fecha_inicio']); ?></p>
                            <p class="job-end-date">Fecha de Finalización: <?php echo htmlspecialchars($trabajo['trabajo_fecha_final']); ?></p>
                            <a href="trabajo/editar" width="10px"><img width="45px" src="<?php echo BASE_URL ?>/css/editar.png" alt="" id="logoEditar"></a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay trabajos</p>
                <?php endif; ?>
                </article>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>