<!DOCTYPE html>
<html >
<head>

     <?php
        include("user_default.php") 
     ?>
     
     <meta charset="UTF-8">
     <title>LOGIN DO M1L G4AU</title>
     <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../css/templatemo_style.css" rel="stylesheet" media="screen"> 
     <link rel="stylesheet" href="../adm/css/style.css">
  </head>

  <body>
      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
  
                  <form action="validar_adm.php"method="post">
                      <div class="login-form">
                         <div class="templatemo_logo">        
                             <img class="logo_arena" src="../images/logo_arena/arenam1lg4au.png">
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
                            <button type="submit" class="log-btn" >ENTRAR</button>
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

    <script src="js/index.js"></script>          
         
</body>
</html>
