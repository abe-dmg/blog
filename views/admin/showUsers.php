<div class="card-panel">
  <table class="centered striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Rol</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php $data->showUsers(); ?>
    </tbody>
  </table>
</div>
<?php if(isset($_POST['changeData'])){; ?>
<?php $nivel = $_POST['nivel']; ?>
<?php $data->changeRol(); ?>
<?php }; ?>