<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Enem</title>
</head>
<body style="background-image:url('img/wallpaper.jpg'); height:1000px; background-attachment: fixed;">
    
    
    <header>
        <nav class="navbar" style="background-color: #FFE606; border-bottom: 2px solid #000;">
           <a class="navbar-brand" href="#">
               <img src="img/enem.png" alt="enem" width="200px" height="150px">
           </a>
           
           <div class="form">
               <?php
                    if (isset($_SESSION['login'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout">Logout</button>
                        </form>';
                    }
                    else {
                        echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="login" placeholder="Login">
                        <input type="password" name="senha" placeholder="Senha">
                        <button type="submit" name="login-button">Login</button>
                    </form>
                    <a href="signup.php" style="color:#000">Cadastrar</a>';
                    }
                ?>
           </div> 
        </nav>
    </header>

<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<main>
    <div class="container mt-5" style= "background-color: #fff; border-left: 2px solid #000; border-right: 2px solid #000; width: 73%; border: 2px solid #000; padding-top: 30px; height:700px;">
        <section>
        <?php
            if (isset($_SESSION['login'])) {
                echo '<b><center><p>Você logou!</p></center></b>';
            }
            else {
                echo '<b><center><p>Você não está logado</p></center></b>';
            }

        ?>
        <ul style="font-size:18px;">
               <?php
                       if($_SESSION['login'] == "admin"){
                           echo '                           <li><a style="color:#000"href="questoes.php?login=admin">Questões</a></li>
                           <li><a style="color:#000" href="usuarios.php" >Usuários</a></li>';
                       } 
                       elseif($login="success"){
                           echo '
                           <li><a style="color:#000"href="usuarios.php">Usuários</a></li>
                           <li><a style="color:#000"href="questoes.php?login=success">Questões</a></li>';
                       }
                      
                       
               ?>
               
           </ul>
        </section>
   <center><img  src="img/enem1.jpg" class="img-fluid mt-5" style="border:2px solid #000;" /><center>
   
    </div>
</main>



    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>