<div class="card-panel">
  <span class="coral">
    <i class="material-icons left">cloud_upload</i>
    Subir una nueva nota
  </span>
</div>
<div class="row">
  <div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="center-align">
        <div class="input-field col s6">
          <input id="title" type="text" name="titulo" required="">
          <label for="title">Titulo de la nota        </label>
        </div>
        <div class="input-field col s6">
          <input id="desc" type="text" name="descripcion" required="">
          <label for="desc">Descripción de la nota</label>
        </div>
        <div class="input-field col s6">
          <select name="relevante" required="">
            <option value="" disable="" selected="">Selecciona una opción</option>
            <option value="1">Es relevante</option>
            <option value="0">No es relevante</option>
          </select>
        </div>
        <div class="input-field col s6">
          <select name="categoria" required="">
            <option value="" disable="" selected="">Selecciona una categoría</option>
            <?php $data->getCategories(); ?>
          </select>
        </div>
        <div class="input-field col s6">
          <input id="keys" type="text" name="claves" required="">
          <label for="keys">Palabras clave para la búsqueda</label>
        </div>
        <div class="input-field col s8">
          <input id="photo" type="file" name="foto" required="">
        </div>
        <div class="input-field col s6">
          <button type="submit" name="sendData" class="cyan darken-2 btn-large waves-effect waves-light">Publicar nota</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php if(isset($_POST['sendData'])){; ?>
<?php $fecha = date('Y-m-d'); ?>
<?php $titulo = $_POST['titulo']; ?>
<?php $descripcion = $_POST['descripcion']; ?>
<?php $categoria = $_POST['categoria']; ?>
<?php $relevante = $_POST['relevante']; ?>
<?php $clave = $_POST['claves']; ?>
<?php $foto = $_FILES['foto']['name']; ?>
<?php $foto_tmp = $_FILES['foto']['tmp_name']; ?>
<?php $data->noteData($titulo, $descripcion, $foto, $foto_tmp, $categoria, $relevante, $clave, $fecha); ?>
<?php $data->uploadData(); ?>
<?php }; ?>