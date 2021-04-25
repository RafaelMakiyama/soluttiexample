<?php
namespace Part2\App\Connect;

use PDO;
use PDOException;

class Connect {

  const HOST = 'localhost';
  const NAME = 'soluttiexample';
  const USER = 'root';
  const PASS = '';
  private $table;
  private $connection;




  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  public function execute($query,$params = []){
    try{
      $statement = $this->connection->query($query);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  public function execute2($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }
        
          /**
           * Método responsável por inserir dados no banco
           * @param  array $values [ field => value ]
           * @return integer ID inserido
           */
          public function insert($values){
            //DADOS DA QUERY
            $fields = array_keys($values);
            $binds  = array_pad([],count($fields),'?');
        
            //MONTA A QUERY
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
            //EXECUTA O INSERT
            $this->execute2($query,array_values($values));
        
            //RETORNA O ID INSERIDO
            return $this->connection->lastInsertId();
          }


          
          public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //DADOS DA QUERY
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        
            //MONTA A QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
     
            //EXECUTA A QUERY
            return $this->execute($query);

          }


          
      





     // function ends

} // class ends
