<!DOCTYPE html>
<html >
<head>

     <?php
        include("../conexao.php");
        include("user_default.php") 
     ?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="UTF-8">
     <title>LOGIN DO M1L G4AU</title>
     <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen"> 
     <link rel="stylesheet" href="../../../adm/css/style.css">

     <!-- JavaScripts -->
    <script src="../../../js/jquery-1.10.2.min.js"></script>

  </head>

  <body>
      <div id="loader"></div>
      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
  
                  <form action="validar_adm.php"method="post">
                      <div class="login-form">
                         <div class="templatemo_logo">        
                             <img class="logo_arena" src="../../../images/logo_arena/arenam1lg4au.png">
                         </div> <!-- /.logo -->

                         <div class="form-group log-status">
                           <input type="text" class="form-control" placeholder="Username " id="UserName" name="usuario" required>
                           <i class="fa fa-user"></i>
                         </div>
                         <div class="form-group log-status">
                           <input type="password" class="form-control" placeholder="Password" id="Passwod" name="senha" required>
                           <i class="fa fa-lock"></i>
                         </div>

                         <div class="button_form">
                            <span class="alert">Invalid Credentials</span>
                            <button type="submit" class="log-btn" >ENTRAR<spam class="glyphicon glyphicon-chevron-right"></spam></button>
                            <a href="../../index.php"><spam class="glyphicon glyphicon-chevron-left"></spam>VOLTAR</spam></a>
                       </div>
                     </div><!--/login-form-->
                  </form>



                  <?php
                     include("../rodape.html");
                  ?>

             </div><!--/.col-md-12-->
           </div><!--/.row-->       
        </div><!--/.container-->
    </div><!--/.main-content-->

    <script>
     $(window).load(function(){
        $("#loader").fadeOut("slow");
     });
    </script>

    <script src="../../../adm/js/index.js"></script> 

         
</body>
     <? mysqli_close($db); ?>
</html>
