<?php
    namespace Src\Entity;

use Exception;
use Src\DB\Database;

    class Usuario {

        public $nome;

        public $email;

        public $senha;

        public $data;

        public $curso;

        public $dataInicial;

        public $dataFinal;

        public $semanasEstudo;

        public function __construct($nome = '', $email = '', $senha = '', $curso = '', $dataInicial = '', $dataFinal = '', $semanasEstudo = ''){
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->curso = $curso;
            $this->dataInicial = $dataInicial;
            $this->dataFinal = $dataFinal;
            $this->semanasEstudo = $semanasEstudo;
        }

        public function cadastrar(){
            $this->data = date('Y-m-d I:m:s');
            $options = ['cost' => 12];
            $this->senha = password_hash($this->senha, PASSWORD_BCRYPT, $options);

            $obDatabase = new Database('usuarios');

            $emailExists = $obDatabase->select('email = "'.$this->email.'"', '','','email')->fetchColumn();

            if(!$emailExists){
                $obDatabase->insert([
                    'nome' => $this->nome,
                    'email' => $this->email,
                    'senha' => $this->senha,
                    'data' => $this->data
                ]);
                return true;
            } else {
                return false;
            }
        }

        public function logar(){
            $obDatabase = new Database('usuarios');
            $emailCadastrado = $obDatabase->select('email="'.$this->email. '"','','', 'nome, email, senha, curso')->fetchObject();
            if(isset($emailCadastrado->email, $emailCadastrado->senha) && $this->email == $emailCadastrado->email && password_verify($this->senha, $emailCadastrado->senha)){
                $this->nome = $emailCadastrado->nome;
                $this->curso = $emailCadastrado->curso;
                return true;
            } else {
                return false;
            }
        }

        public function atualizarCurso(){
            $database = new Database('usuarios');

            $atualizado = $database->update('email="'.$this->email.'"', ['curso' => $this->curso, 'dataInicial' => $this->dataInicial, 'dataFinal' => $this->dataFinal, 'semanasEstudo' => $this->semanasEstudo]);
            return $atualizado;
        }
    }