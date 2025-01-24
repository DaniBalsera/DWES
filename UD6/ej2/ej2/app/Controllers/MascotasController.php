<?php

namespace App\Controllers;

use App\Models\Mascotas;

class MascotasController extends BaseController
{
    public function IndexAction()
    {
        // Creamos una instancia de mascotas
        $mascota = Mascotas::getInstancia();

        // Almacenamos los datos en $data
        $data['mascotas'] = $mascota->getAll();

        // Llamamos a la función renderHTML
        $this->renderHTML('../app/view/index_view.php', $data);

        $data['mascotas'] = $mascota->getAll();
        $this->renderHTML('../app/view/index_view.php', $data);
    }
}

?>