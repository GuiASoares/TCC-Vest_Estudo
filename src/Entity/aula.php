<?php
    namespace Src\Entity;

    use Src\DB\Database;

    class Aula {
        public $id;

        public $nome;

        public $materia;

        public $conteudo;

        public function __construct($id = '', $materia = ''){
            $this->id = $id;
            $this->materia = $materia;
        }

        public function consultar(){
            $database = new Database('aulas');

            $consulta = $database->select('id="' .$this->id. '"')->fetchObject();

            $this->nome = $consulta->nome;
            $this->materia = $consulta->materia;
            $this->conteudo = $consulta->conteudo;
        }

        public function consultarMateria(){
            $database = new Database('aulas');

            return $database->select('materia="' .$this->materia. '"', '', '', 'id, nome')->fetchAll();
        }
    }