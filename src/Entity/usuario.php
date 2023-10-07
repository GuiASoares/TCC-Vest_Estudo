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

        public function __construct($nome = '', $email = '', $senha = ''){
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function cadastrar(){
            $this->data = date('Y-m-d I:m:s');

            $obDatabase = new Database('usuarios');

            $emailExists = $obDatabase->select('email = "'.$this->email.'"', fields: 'email')->fetchColumn();

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
            $emailCadastrado = $obDatabase->select('email="'.$this->email. '"', fields: 'nome, email, senha, curso')->fetchObject();
            if(isset($emailCadastrado->email, $emailCadastrado->senha) && $this->email == $emailCadastrado->email && $this->senha == $emailCadastrado->senha){
                $this->nome = $emailCadastrado->nome;
                $this->curso = $emailCadastrado->curso;
                return true;
            } else {
                return false;
            }
        }
    }