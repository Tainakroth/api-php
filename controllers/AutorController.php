<?php
    require_once './models/AutorModel.php';

    class AutorCOntroller {

        public function getAutores(){
            $autorModel = new AutorModel();

            $response = $autorModel->getAutores();
            return json_encode([

           
                'erro' => null,
                'result' => $response
            ]);
        }
    }

?>