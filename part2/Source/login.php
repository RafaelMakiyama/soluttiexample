<?php
require("../../vendor/autoload.php");
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuário - Plataforma</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="registration-form">
    <form action="../App/Controller/LoginController.php" method="POST">
        <div class="form-icon">
        <?php echo isset($error) ? $error : ''; ?>
            <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="email" placeholder="Email" name="email">
        </div>

        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="password" placeholder="Senha">
        </div>
        <div class="form-group">
            <button type="submit" name="action" value="login" class="btn btn-block create-account">Criar conta</button>
        </div>


    </form>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
