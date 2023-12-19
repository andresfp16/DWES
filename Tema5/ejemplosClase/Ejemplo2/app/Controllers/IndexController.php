<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function IndexAction()
    {
        $data = ["message" => "Hola Mundo"];
        $this->renderHTML("../app/Views/index_view.php", $data);
    }

    public function SaludaAction($request)
    {
        $urlDecode = explode("/", $request);
        $data = ["message" => "Saludos " . end($urlDecode)];
        $this->renderHTML("../app/Views/index_view.php", $data);
    }

    public function NumerosAction()
    {
        $numerosPares = [];
        $i = 2;
        while (count($numerosPares) < 10) {
            $numerosPares[] = $i;
            $i += 2;
        }
        $cadenaNumeros = implode('</br', $numerosPares);

        $data = ["message" => $cadenaNumeros];
        $this->renderHTML("../app/Views/index_view.php", $data);
    }
}
