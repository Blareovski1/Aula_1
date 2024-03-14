<?php
           session_start();
           ob_start();
           
           //Receber o id do usuario 
           $id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);   
           
         
        ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>_lista_conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="text-transform: uppercase;">
    <div class="container">
    <nav class="navbar navbar-expand navbar navbar-dark bg-dark">
  <a class="navbar-brand" ></a>
  <a class="navbar-brand" >informação</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link text-primary" href="index.php">lista</a>
      </li>
    
      <li class="nav-item dropdown">
      <a class="nav-link text-primary" href="caduser.php">CADASTRAR</a>
      
      </li>
      
    </ul>
   
  </div>
</nav>
<!-- nav bar -->
        <br>
        <div class="h1 text-center">informação do  CONTA</div>
        <?php
         if (isset($_SESSION['msg'])) {//pergunto se tem valor dentro da session
            echo $_SESSION['msg'];//exibe o conteudo da session
            unset($_SESSION['msg']);//mata a session
        }
        //verificar se o  id tem valor 
           if(!empty($id)){
            require './Conn.php';
            require './User.php';
             //instanciar a classe e criar o objeto
         $viewUser = new User();
         //Enviando o id para o atributo id da classe User
         $viewUser->id = $id  ;
         //instaciano o metodo visualizar
         $valueUser = $viewUser->View();//chamando o metodo view 
         extract($valueUser);
         echo "ID: $id <br><hr>";
         echo "NOME: $nome <br><hr>";
         echo "VALOR: $valor <br><hr>";
         echo "data de vencimentos: $due_date <br><hr>";
         echo "PRESTAÇÃO: $installments <br><hr>";
         echo "OBS: $obs <br><hr>";
         echo "DATA: $created <br><hr>";
         echo "DATA MODIFICAÇÃO: $modified <br><hr>";
         
           } else {
            $_SESSION["msg"] = "<p style='color:red'>ERRO USUARIO NÃO ENCONTRADO</p>";
            header("Location:index.php");
           }

        
        ?>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>