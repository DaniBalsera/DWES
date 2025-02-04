<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Animales;

class AnimalesController extends BaseController
{
    public function IndexAction($filter)
    {
       
        $data = array();
        $animales = Animales::getInstancia();
        $data['animal'] = $animales->getAnimalesByFilter($filter);

        $this->renderHTML('../app/views/index_view.php', $data);
    }

    public function ShowAction($filter = '')
    {
        $data = array();
        $animales = Animales::getInstancia();
        $data['animal'] = $animales->getAnimalesByFilter($filter);
        $this->renderHTML('../app/views/list_view.php', $data);
    }
}
?>
