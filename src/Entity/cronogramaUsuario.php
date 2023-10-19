<?php 
    namespace Src\Entity;

    use Src\DB\Database;

    class CronogramaUsuario {

        public $usuario;

        public $cronograma;

        public $aulasSemana;

        public function __construct($usuario, $cronograma, $aulasSemana)
        {
            $this->usuario = $usuario;
            $this->cronograma = $cronograma;
            $this->aulasSemana = $aulasSemana;
        }

        public function criarCronograma(){
            $database = new Database('cronogramaUsuario');

            $database->insert([
                'usuario' => $this->usuario,
                'cronograma' => $this->cronograma,
                'aulasSemana' => $this->aulasSemana
            ]);

            return true;
        }
    }
?>