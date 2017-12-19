<div class="card-panel">
  <span class="coral">
    <i class="material-icons left">cloud_upload</i>
    Subir una nueva categoría
  </span>
</div>
<div class="row">
  <div>
    <form action="" method="post">
      <div class="input-field col s6">
        <input id="name" type="text" name="nombre" required="">
        <label for="name">Nombre de la categoría</label>
      </div>
      <div class="input-field col s6">
        <button type="submit" name="sendData" class="cyan darken-2 btn-large waves-effect waves-light">Publicar categoría</button>
      </div>
    </form>
  </div>
</div>
<?php if(isset($_POST['sendData'])){; ?>
<?php $nombre = $_POST['nombre']; ?>
<?php $data->dataCategory($nombre); ?>
<?php $data->uploadCategory(); ?>
<?php }; ?>