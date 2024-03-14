<?php
    session_start();//inicializando a session/sessao
    ob_start();//limpa os ultimos registro da session
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>_lista_conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="text-transform: uppercase;">
    <div class="container">
    <nav class="navbar navbar-expand navbar navbar-dark bg-dark">
  <a class="navbar-brand" ></a>
  <a class="navbar-brand" >Cadastrar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
   
    
      <li class="nav-item dropdown">
      <a class="nav-link text-primary"  href="index.php">lista</a>
      
      </li>
      
    </ul>
   
  </div>
</nav>
<!-- nav bar -->
     
        <br><br>
        <div class="h1 text-center">Cadastrar conta</div>
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                         <!-- nome do usuarios  -->
                    <span class="input-group-text" id="basic-addon1">Nome</span>
                </div>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-label="nome" aria-describedby="basic-addon1" require>
            </div>
      
             <!-- valor da conta   -->
             <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">valor</span>
                </div>
                <input type="number" name="valor" id="valor" class="form-control" placeholder="digite o valor" aria-label="valor" aria-describedby="basic-addon1" require>
            </div>
            <!-- quantidade   parcela  -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Quantidade de parcela </span>
                </div>
                <input type="number" name="installments" id="installments" class="form-control" placeholder="digite o valor" aria-label="installments" aria-describedby="basic-addon1" require>
            </div>
             <!--vencimento da parcela   -->
             <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">data de vencimento  </span>
                </div>
                <input type="date" name="due_date" id="due_date" class="form-control" placeholder="digite o valor" aria-label="installments" aria-describedby="basic-addon1" require>
            </div>
  <!-- obs  -->
  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Obs </span>
                </div>
                <input type="text" name="obs" id="obs" class="form-control" placeholder="digite a obs" aria-label="obs" aria-describedby="basic-addon1" require>
            </div>
            <!-- data é hora da criação   -->
  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Data </span>
                </div>
                <input type="datetime-local" name="created" id="created" class="form-control" placeholder="digite o valor" aria-label="created" aria-describedby="basic-addon1" require>
            </div>
            
         
            <input type="submit" class="btn btn-primary" value="Salvar" name="salvar">
            </div>
                    
            
        </form>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
    /* Código para Cadastrar */
    require './Conn.php';
    require './User.php';
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['salvar'])) {
        //var_dump($formData);
        $insertUser = new User();
        $insertUser->formData = $formData;
        $valor = $insertUser->insert();

        if ($valor) {
            $_SESSION['msg'] = "<p style='color:green'>Registro cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red'>Ocorreu Erro!</p>";
        }
    }
?>