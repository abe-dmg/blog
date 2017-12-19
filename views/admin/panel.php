<!DOCTYPE html>
<html>
  <head>
    <title>Mi Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css" rel="stylesheet">
    <link href="../../assets/css/main.css" rel="stylesheet">
  </head>
  <body></body>
  <?php include('../../config/controllers/AdminController.php'); ?>
  <?php $data = new AdminController(); ?>
  <?php ob_start(); ?>
  <?php session_start(); ?>
  <?php if (!isset($_SESSION['correo'])) {; ?>
  <?php header('Location: ../index.php?userLogin'); ?>
  <?php exit(); ?>
  <?php }else{ { ?>
    <!-- Barra de navegación noob -->
    <nav class="white">
      <div class="nav-wrapper">
        <a href="#!" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons coral">menu</i>
        </a>
        <div class="container">
          <a href="panel.php" class="brand-logo">Administración</a>
          <ul class="right hide-on-med-and-down">
            <?php $data->getCurrentUser(); ?>
          </ul>
        </div>
      </div>
      <ul class="sidenav" id="mobile-demo">
        <?php $data->getCurrentUser(); ?>
      </ul>
    </nav>
    <div class="row">
      <div class="col s12 m4 l3">
        <div class="card-panel">
          <span class="coral">
            <i class="material-icons left">view_list </i>
            Menú de opciones
          </span>
        </div>
        <div class="collection z-depth-1">
          <a href="../index.php" class="collection-item">Ir al blog</a>
          <a href="panel.php?uploadNote" class="collection-item">Subir nota</a>
          <a href="panel.php?uploadCategory" class="collection-item">Subir categoría</a>
          <a href="panel.php?showCategories" class="collection-item">Ver categorías</a>
          <a href="panel.php?showNotes" class="collection-item">Ver notas</a>
          <a href="panel.php?showUsers" class="collection-item">Ver roles</a>
        </div>
      </div>
      <div class="col s12 m8 l9">
        <?php if(isset($_GET['uploadNote'])){; ?>
        <?php include('uploadNote.php'); ?>
        <?php }elseif(isset($_GET['showNotes'])){; ?>
        <?php include('showNotes.php'); ?>
        <?php }elseif(isset($_GET['showUsers'])){; ?>
        <?php include('showUsers.php'); ?>
        <?php }elseif(isset($_GET['uploadCategory'])){; ?>
        <?php include('uploadCategory.php'); ?>
        <?php }elseif(isset($_GET['showCategories'])){; ?>
        <?php include('showCategories.php'); ?>
        <?php }else{; ?>
        <?php include('showNotes.php'); ?>
        <?php }    ; ?>
      </div>
    </div>
    <?php }; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>
    <script src="../../assets/js/main.js"></script>
  <?php } ?>
</html>