<?php

namespace Part2\App\Controller;

use Part2\App\Connect\Connect;
use Part2\App\Model\User;

require("../../../vendor/autoload.php");

$db = new Connect();


if ($_REQUEST['action'] == 'login')
{
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->email = $email;    
    $user->password = $password;
    $result = $user->login($email);

    if($result != NULL ){
        if(password_verify($user->password, $result->pass)){
            header('Location:../../Source/dashboard.php');
            exit;
        } else{
            
            $error = 'Conta inválida';
            header('Location:../../Source/login.php');
            }
    
    


    }  else {
        $error = 'Conta inválida';
        header('Location:../../Source/login.php');

    }


    
    
    



}