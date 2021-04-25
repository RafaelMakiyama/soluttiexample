<?php
require("../../vendor/autoload.php");
?>
<!DOCTYPE html>
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


    <form action="../App/Controller/RegisterController.php" method="POST">
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        <?php
$message = $_REQUEST['message'];
echo $message;

?>
        <div class="form-group">
            <input type="text" class="form-control item" id="name" name="name" placeholder="Nome completo">
        </div>
        <div class="form-group">
            <input type="date" class="form-control item" id="birthday" name="birthday" placeholder="Data de nascimento">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="cpf" placeholder="CPF" name="cpf">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number" name="phone-number">
        </div>
        <div class="form-group">
            <input name="cep" class="form-control item" type="text" id="cep" value="" size="10" maxlength="9"
                   onblur="pesquisacep(this.value);" placeholder="Digite o CEP"/>
        </div>
        <div class="form-group">
            <input name="rua" class="form-control item" type="text" id="rua" size="60" /></label>
        </div>
        <div class="form-group">
            <input name="bairro" class="form-control item" type="text" id="bairro" size="40" />
        </div>
        <div class="form-group">
            <input name="cidade" class="form-control item" type="text" id="cidade" size="40" /></label>
        </div>
        <div class="form-group">
            <input name="uf" class="form-control item" type="text" id="uf" size="2" />
        </div>


        <div class="form-group">
            <input type="text" class="form-control item" id="email" placeholder="Email" name="email">
        </div>

        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="password" placeholder="Senha">
        </div>
        <div class="form-group">
            <button type="submit" name="action" value="cadastrar" class="btn btn-block create-account">Criar conta</button>
        </div>


    </form>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="assets/js/script.js"></script>
<script>
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
</body>
</html>
