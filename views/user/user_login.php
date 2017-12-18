<div class="container">
  <div class="col s8">
    <div class="card-panel">
      <form action="" method="post">
        <div class="container">
          <div class="center-align">
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
              <button type="submit" name="login" class="cyan darken-2 btn-large waves-effect waves-light">Iniciar sesión</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php if(isset($_POST['login'])){; ?>
<?php $correo = $_POST['correo']; ?>
<?php $pass = $_POST['pass']; ?>
<?php $data->dataLogin($correo, $pass); ?>
<?php $data->login(); ?>
<?php }; ?>