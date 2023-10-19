<?php
    namespace Src\DB;
    
    use \PDO;
    use PDOException;
    use Src\Common\Environment;

    Environment::load('../..');

    class Database{

        // nome da tabela a ser manipulado
        // @var string
        private $table;

        // instância de conexão com Banco de Dados
        // @var PDO
        private $connection;

        // define a tabela que instacia a conexão
        // @param string $table
        public function __construct($table=null){
            $this->table = $table;
            $this->setConnection();
        }

        // método responsável por criar uma conexão com o Banco de Dados
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME'), getenv('USER'), getenv('PASSWORD'));
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                die('ERROR: ' . $e->getMessage());
            }
        }

        // método responsável por executar Queries dentro do Banco de Dados
        // @params string $query
        // @param array $params
        // @return PDOStatement
        public function execute($query, $params = []){
            try {
                $statement = $this->connection->prepare($query);
                $statement->execute($params);
                return $statement;
            } catch(PDOException $e) {
                die('ERROR: ' . $e->getMessage());
            }
        }

        // método responsável por inserir valores no banco
        // @param array $values { field => value }
        // @return integer ID Inserido
        public function insert($values){
            // Dados da Query
            $fields = array_keys($values);
            $binds = array_pad([], count($fields), '?');

            // Monta a Query
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

            // executa o insert
            $this->execute($query, array_values($values));

            // retorna o ID inserido
            return $this->connection->lastInsertId();
        }

        // método responsável por executar uma consulta no Banco de Dados
        // @param string $where
        // @param string $order
        // @param string $limit
        // return PDOStatement
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            // DADOS DA QUERY
            $where = !empty($where) ? 'WHERE '. $where : '';
            $order = !empty($order) ? 'ORDER BY '. $order : '';
            $limit = !empty($limit) ? 'LIMIT '. $limit : '';

            // MONTA A QUERY
            $query = 'SELECT ' .$fields. ' FROM '. $this->table. ' '.$where. ' ' .$order. ' ' .$limit;

            // EXECUTA A QUERY
            return $this->execute($query);
        }

        // método responsável por executar atualizações no Banco de Dados
        // @param string $where
        // @param array $values [ field => value ]
        // return boolean
        public function update($where, $values = []){
            // DADOS DA QUERY
            $fields = array_keys($values);

            // MONTA A QUERY
            $query = 'UPDATE ' .$this->table. ' SET '.implode('=?,', $fields).'=? WHERE ' .$where;

            // EXECUTAR A QUERY
            $this->execute($query, array_values($values));

            // RETORNA SUCESSO
            return true;
        }

        // método responsável por excluir dados do Banco de Dados
        // @param string $where
        // return boolean
        public function delete($where){
            // MONTA A QUERY
            $query = 'DELETE FROM ' .$this->table. ' WHERE ' .$where;

            // EXECUTA A QUERY
            $this->execute($query);

            // RETORNA SUCESSO
            return true;
        }
    }