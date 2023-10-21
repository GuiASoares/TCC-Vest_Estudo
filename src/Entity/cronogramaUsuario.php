<?php 
    namespace Src\Entity;

    use Src\DB\Database;

    class CronogramaUsuario {

        public $usuario;

        public $cronograma;

        public $aulasSemana;

        public $aulasConcluidas;

        public $semanasConcluidas;

        public function __construct($usuario = '', $cronograma = '', $aulasSemana = '')
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

        public function consultar(){
            $database = new Database('cronogramaUsuario');

            $consulta = $database->select('usuario="' .$this->usuario. '"')->fetchObject();

            $this->aulasSemana = $consulta->aulasSemana;
            $this->aulasConcluidas = $consulta->aulasConcluidas;
            $this->semanasConcluidas = $consulta->semanasConcluidas;
        }

        public function atualizar($values){
            $database = new Database('cronogramaUsuario');

            $database->update('usuario="' .$this->usuario. '"', $values);

            return true;
        }
    }
?>