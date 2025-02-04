<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Animales</title>
    <style>
        body {
            background-color: #131313;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Gestión de Animales</h1>

    <form action="" method="get">
        <input type="text" name="filtro" id="filtro" onkeyup="showAnimales(this.value)">
    </form>
    <?php
    
    include 'list_view.php'; 
    
    
    ?>

    <script>
        function showAnimales(str) {
            if (str.length === 0) {
                document.getElementById("resultado").innerHTML = "";
                return;
            }

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("resultado").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET",  "http://mascotas.local/getAnimales.php?q=" + str, true);
            xhttp.send();
        }
    </script>

</body>
</html>
