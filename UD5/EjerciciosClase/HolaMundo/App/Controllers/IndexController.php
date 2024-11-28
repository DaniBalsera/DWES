<?php

namespace App\Controllers;


class IndexController extends BaseController {

    public function IndexAction()
    {
    $data = array('message' => 'Hola mundo');
    $this->renderHTML('../app/view/index_view.php',$data);
    }

    public function HelloAction($request)
    {
    $ruta = explode('/',$request);
    $nombre = end($ruta);
    $data = array('message' => 'Hola '. $nombre);
    $this->renderHTML('../app/view/index_view.php',$data);
    }

    public function ParesAction($request)
    {
        $pares = [];
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2 == 0) {
                $pares[] = $i;
            }
        }
    }
    
   
    }

?>