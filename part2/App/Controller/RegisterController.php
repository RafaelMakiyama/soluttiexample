<?php

namespace Part2\App\Controller;
require("../../../vendor/autoload.php");


use Part2\App\Model\Person;
use Part2\App\Connect\Connect;
use Part2\App\Model\Address;
use Part2\App\Model\User;

$db = new Connect();

if ($_REQUEST['action'] == 'cadastrar')
{
    $person = new Person();
    $person->name = $_POST['name'];
    $person->birthday = $_POST['birthday'];
    $person->cpf = $_POST['cpf'];
  

    $address = new Address();
    $address->street = $_POST['rua'];
    $address->district = $_POST['bairro'];
    $address->city = $_POST['cidade'];
    $address->state = $_POST['uf'];

    $user = new User();
    $user->email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user->password = $password_hash;
    
    $cpfExits = $person->verifyCpf($person->cpf);
    $emailExits = $user->verifyEmailExits($user->email);


    if($cpfExits == false AND $emailExits == false){
        $person->cadastrar();
        $personId = $person->id;
        $address->idPerson = $personId;    
        $address->cadastrar();
        $user->idPerson = $personId;
        $user->cadastrar();
      
        header("Location:../../Source/login.php");
        exit;
    } else {

        $message  = 'CPF ou EMAIL já cadastrado.';
        var_dump($message);
      
        header("Location:../../Source/index.php?message=".$message);

    }

    
}