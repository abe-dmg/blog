<!DOCTYPE html>
<html>
  <head>
    <title>Mi Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
  </head>
  <body></body>
  <?php include('../config/controllers/FunctionController.php'); ?>
  <?php $data = new FunctionController(); ?>
  <?php ob_start(); ?>
  <?php session_start(); { ?>
    <!-- Barra de navegación noob -->
    <nav class="white">
      <div class="nav-wrapper">
        <a href="#!" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons coral">menu</i>
        </a>
        <div class="container">
          <a href="index.php" class="brand-logo">Mi Blog</a>
          <ul class="right hide-on-med-and-down">
            <?php $data->getCurrentUser(); ?>
          </ul>
        </div>
      </div>
      <ul class="sidenav" id="mobile-demo">
        <?php $data->getCurrentUser(); ?>
      </ul>
    </nav>
    <!-- Ventanas de Sesión y Registro -->
    <?php if(isset($_GET['userLogin'])){ ; ?>
    <?php include('user/user_login.php');  ?>
    <?php }elseif(isset($_GET['userSignup'])){ ; ?>
    <?php include('user/user_signup.php');  ?>
    <?php }elseif(isset($_GET['idNote'])){; ?>
    <?php include('user/showNote.php'); ?>
    <?php }else{ ; ?>
    <?php include('user/template.php');  ?>
    <?php }; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>
    <script src="../assets/js/main.js"></script>
  <?php } ?>
</html>