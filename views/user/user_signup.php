<div class="container">
  <div class="col s8">
    <div class="card-panel">
      <form action="" method="post">
        <div class="container">
          <div class="center-align">
            <div class="input-field col s8">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" type="text" name="nombre" required="">
              <label for="name">Nombre</label>
            </div>
            <div class="input-field col s8">
              <i class="material-icons prefix">account_circle</i>
              <input id="last" type="text" name="apellido" required="">
              <label for="last">Apellido</label>
            </div>
            <div class="input-field col s8">
              <i class="material-icons prefix">email</i>
              <input id="mail" type="email" name="correo" required="">
              <label for="mail">Correo electrónico</label>
            </div>
            <div class="input-field col s8">
              <i class="material-icons prefix">dialpad</i>
              <input id="pass" type="password" name="pass" required="">
              <label for="pass">Contraseña</label>
            </div>
            <div class="input-field col s8">
              <button type="submit" name="sign_up" class="cyan darken-2 btn-large waves-effect waves-light">Regístrame</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php if(isset($_POST['sign_up'])){; ?>
<?php $nombre = $_POST['nombre'];     ?>
<?php $apellido = $_POST['apellido']; ?>
<?php $correo = $_POST['correo']; ?>
<?php $pass = $_POST['pass']; ?>
<?php $data->dataSignUp($nombre, $apellido, $correo, $pass); ?>
<?php $data->uploadUser(); ?>
<?php }; ?>