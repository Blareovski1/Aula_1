<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title >lista_conta </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="text-transform: uppercase;"> 

    <div class="container">
    <nav class="navbar navbar-expand navbar navbar-dark bg-dark">
    <img src="https://www.php.net//images/logos/new-php-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
  <a class="navbar-brand" ></a>
  <a class="navbar-brand" href="#">Lista</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
      </li>
    
      <li class="nav-item dropdown">
      <a class="nav-link text-primary" href="caduser.php">CADASTRAR</a>
      
      </li>
      
    </ul>
   
  </div>
</nav>
        
      

        
        <?php
            if (isset($_SESSION['msg'])) {//pergunto se tem valor dentro da session
                echo $_SESSION['msg'];//exibe o conteudo da session
                unset($_SESSION['msg']);//mata a session
            }

            require './Conn.php';
            require './User.php';

            $list = new User();
            $result = $list->list();

            echo "<br><div class='h1 text-center'>Lista de Contas</div>";
            echo "<hr>";
            foreach($result as $row){
                extract($row);
           
                echo "ID: " . $row['id']. "<br>";
                echo "Nome: " . $row['nome']. "<br>";
                /* echo "Valor a pagar: " . $row['valor']. "<br>";
                echo "Prestação: " . $row['installments']. "<br>";
                echo "Observação: " . $row['obs']. "<br>";
                echo "Data: " . $row['created']. "<br>"; */
              echo "<br><a class='btn btn-primary    ' href='view.php?id=$id'>visualizar</a>";
              
                echo "<hr>";
            }
        ?>
   <div class="jumbotron">
  <h1 class="display-4">Cadastro finalizado!</h1>
  <p class="lead">Seja redirecionado para outra pagina quando clickar nesse botão.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="#" role="button">REDIRECIONAMENTO</a>
  </p>
</div>
</div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>