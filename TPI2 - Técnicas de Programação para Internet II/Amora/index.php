<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php session_start(); ?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Aroma de Amora </title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <script language="javascript" type="text/javascript">
        function recarregar(categoria) {
            document.location = 'index.php?categoria=' + categoria;
        }
    </script>
    <script src="js/js.js"></script>
</head>

<body id="body">
<script src="js/qq.js"></script>
    <div class="bg"></div>
            <div class="bg bg2"></div>
            <div class="bg bg3"></div>
    <header>
        <nav class="navbar navbar-expand-lg   " id="mainNav">
            <div class="container-fluid">
            <img class="img-fluid " src="img/logo.png" id="logo">
                <nav class="navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    </nav>
  <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
      
    
                
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav " id="itens">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link " href="inf.php">INFORMAÇÕES</a>
                        </li>
                        <?php if($_SESSION["usuario"] == "admin")
                        {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link " href="admin.php">ADMIN</a>
                        </li> <?php
                        }?>
                    </ul>
                </div>
                <Div id="msgLogin">
                    <?php 		

			if(isset($_SESSION['usuario']))
            {
            ?>
                    <p align=right>Bem vindo <?php echo $_SESSION["usuario"];?>, deseja<a href="deslogar.php">
                            Deslogar?</a>
                        <?php
            }else{
                echo"<p align=right>Voce não está logado, deseja fazer <a href='login.php'>login</a> ?</p>";
            }
            ?>
            <a class="fa fa-shopping-cart fa-3x" aria-hidden="true" href="carrinho.php"></a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5 " id="corpo">
        <h3 align="center">Produtos a venda</h3>
        <form align="right">
            <p>
                <select name="categoria" onChange="recarregar(this.value);">
                    <option value="">-Selecione uma categoria-</option>
                    <option value="Todas">Todas</option>
                    <option value="Bolos Confeitados">Bolos Confeitados</option>
                    <option value="Docinhos">Docinhos</option>
                    <option value="Tortas">Tortas</option>
                    <option value="Bolos Caseiros">Bolos Caseiros</option>
                    <option value="Cupcakes">Cupcakes</option>
                    <option value="Naked Cakes">Naked Cakes</option>
                </select>
            </p>
            <noscript>
                <input type='submit'>
            </noscript>
        </form>
        <?php
require("conexao.php");
if(isset($_GET["categoria"]) && $_GET["categoria"]!='Todas'){
    $categoria = $_GET["categoria"];
    echo "<p id='cat'> $categoria </p>";
    $query = "SELECT * FROM produtos WHERE nome_categoria = '$categoria' ORDER BY preco_produto ASC";
}else{
    echo "<p id='cat'> Todos os produtos </p>";
    $query = "SELECT * FROM produtos ORDER BY preco_produto ASC";
}

				$resultado = mysqli_query($conexao, $query);
				if(mysqli_num_rows($resultado) > 0)
				{
					while($row = mysqli_fetch_array($resultado))
                    { 
                        ?>
        <hr>
        </hr>
        
        <div class="container col">
            <div class="row">


                <div class="card m-2" style="width: 15rem; height: 40rem;">
                    <img class="card-img-top" src="fotos_produtos/<?php echo $row["imagem"];?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["nome_produto"];?></h5>
                        <h6 class="card-title"><?php echo $row["preco_produto"];?>R$</h6>
                        <p class="card-text"><?php echo $row["info"];?></p>
                        <a href="produtos.php?id_produto=<?php echo $row["id_produto"]?>"
                            class="btn btn-primary">Comprar -></a>
                    </div>
                
                </div> <?php
                        
                    }
                }
			?>
          
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
<html>