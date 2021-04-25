<?php
namespace Part2\App\Model;

use Part2\App\Connect\Connect;
use PDO;

class User {
    public $email, $password;



        public function cadastrar(){
            //DEFINIR A DATA
        
            //INSERIR A VAGA NO BANCO
            $objeto = new Connect('users');
            $this->id = $objeto->insert([
                                              'email'    => $this->email,
                                              'pass' => $this->password,
                                            ]);
        
            //RETORNAR SUCESSO
            return true;
          }

          public  function login($email){

              $objeto = new Connect('users');
              $result = $objeto->select("email = '$email' ");
              

            return $result->fetch(PDO::FETCH_OBJ);
                                                 

          }

          public function verifyEmailExits($email){
            $objeto = new Connect('users');
            $result = $objeto->select("email = '$email' ");  
            return $result->fetch(PDO::FETCH_OBJ);


          }
        




}
