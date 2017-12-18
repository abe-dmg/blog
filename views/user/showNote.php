<!-- Barras de navegación laterales -->
<?php if (!isset($_SESSION['correo'])) {; ?>
<?php header('Location: ../views/index.php?userLogin'); ?>
<?php exit(); ?>
<?php }else{ { ?>
  <div class="row">
    <div class="col s12 m4 l3">
      <div class="card-panel">
        <span class="coral">
          <i class="material-icons left">view_list </i>
          Categorías
        </span>
      </div>
      <div class="collection z-depth-1">
        <?php $data->getCategories(); ?>
      </div>
    </div>
    <div class="col s12 m8 l9">
      <?php $data->getNote(); ?>
      <div class="card-panel">
        <span class="coral">
          <i class="material-icons left">message</i>
          Comentarios
        </span>
      </div>
      <div class="container">
        <form action="" method="post">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">chat</i>
              <input id="chat" name="descripcion" type="text" required="">
              <label for="chat">Escribe tu comentario</label>
            </div>
            <div class="input-field col s6">
              <button type="submit" class="cyan darken-2 btn waves-effect waves-light" name="sendComent">Enviar comentario</button>
            </div>
          </div>
        </form>
      </div>
      <?php if(isset($_POST['sendComent'])){; ?>
      <?php $fecha = date('y-m-d'); ?>
      <?php $descripcion = $_POST['descripcion']; ?>
      <?php $data->dataCreateComent($descripcion, $fecha); ?>
      <?php $data->createComent(); ?>
      <?php }; ?>
      <?php $data->getAllComents(); ?>
    </div>
  </div>
<?php } ?>
<?php }; ?>