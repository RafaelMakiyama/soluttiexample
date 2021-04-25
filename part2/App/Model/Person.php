<?php
namespace Part2\App\Model;

use Part2\App\Connect\Connect;
use PDO;


    class Person{
        public  $name, $birthday, $cpf;


        public function cadastrar(){
            //DEFINIR A DATA
            $this->birthday = date('Y-m-d H:i:s');
        
            //INSERIR A VAGA NO BANCO
            $objeto = new Connect('person');
            $this->id = $objeto->insert([
                                              'name'    => $this->name,
                                              'birthday' => $this->birthday,
                                              'cpf'     => $this->cpf,
                                            ]);
        
            //RETORNAR SUCESSO
            return true;
          }
        
          public  function verifyCpf($cpf){

            $objeto = new Connect('person');
            $result = $objeto->select("cpf = '$cpf' ");
            

          return $result->fetch(PDO::FETCH_OBJ);
                                               

        }

    }


