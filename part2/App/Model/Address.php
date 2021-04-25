<?php
namespace Part2\App\Model;

use Part2\App\Connect\Connect;


    class Address{
        public  $street, $district, $city,$state, $idPerson;


        
        public function cadastrar(){
     
            //INSERIR A VAGA NO BANCO
            $objeto = new Connect('address');
            $this->id = $objeto->insert([
                                              'street'    => $this->street,
                                              'district' => $this->district,
                                              'city'     => $this->city,
                                              'state' => $this->state,
                                              'idPerson'=> $this->idPerson
                                            ]);
        
            //RETORNAR SUCESSO
            return true;
          }


    }