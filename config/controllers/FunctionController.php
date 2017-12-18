<?php 
include('../config/model/database.php');

class FunctionController{
    private $nombre, $apellido, $correo, $pass, $descripcion, $fecha;

    public function dataSignUp($nombre, $apellido, $correo, $pass){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->pass = $pass;
    }

    public function uploadUser(){
        $conexion = new Database();
        $query = "INSERT INTO usuarios(nombre, apellido, correo, pass, nivel) 
                VALUES ('$this->nombre','$this->apellido','$this->correo',sha1('$this->pass'), 'Usuario')";
        $data = $conexion->query($query);

        if($data){
            echo "<script>M.toast({html: 'Te has registrado correctamente, ahora inicia sesión'})</script>";
        }else{
            echo "<script>M.toast({html:'Ocurrió un error, verifica o intenta de nuevo'})</script>";
        }
    }

    public function dataLogin($correo, $pass){
        $this->correo = $correo;
        $this->pass = $pass;
    }

    public function login(){
        $conexion = new Database();
        $query = "SELECT * FROM usuarios WHERE correo = '$this->correo' AND pass = sha1('$this->pass')";
        $row = $conexion->query($query);
        $user = $row->fetch_array();

        $checkUser = mysqli_num_rows($row);
        if($checkUser == 0){
            echo "Correo o contraseña incorrectos";
        }else{
            session_start();
            $_SESSION['correo'] = $this->correo;
            if($user['nivel'] == 'Administrador'){
                header('Location: admin/panel.php');
            }else if($user['nivel'] == 'Usuario'){
                header('Location: index.php');
            }
        }
    }

    public function getCurrentUser(){
        if(!isset($_SESSION['correo'])){
            echo "
                <li><a href='index.php?userLogin'>Inicia sesión</a></li>
                <li><a href='index.php?userSignup'>Regístrate</a></li>
            ";
        }else{
            echo "<li><a href='../config/controllers/eliminar.php?cerrar_sesion'>Cerrar sesión</a></li>";
        }    
    }

    public function getCategories(){
        $conexion = new Database();
        $category = "SELECT * FROM categorias";
        $query = $conexion->query($category);
        while($row = $query->fetch_array()){
            echo "
                <a href='index.php?idCategory=$row[id]' class='collection-item'>$row[nombre]</a>
            ";
        }
    }

    public function getAllNotes(){
        $conexion = new Database();
        $note = "SELECT * FROM notas";
        $query1 = $conexion->query($note);

        while($row = $query1->fetch_array()){
            $writer = "SELECT * FROM usuarios WHERE id = '$row[id]'";
            $query2 = $conexion->query($writer);

            while($users = $query2->fetch_array()){

                echo "
                <div class='col s10 m4'>
                  <div class='card carta hoverable'>
                    <div class='card-image'>
                      <img src='../assets/img/$row[foto]'>
                      <span class='card-title'>$row[titulo]</span>
                      <a href='index.php?idNote=$row[id]' class='btn-floating pulse halfway-fab waves-effect waves-light cyan darken-2'><i class='material-icons'>add</i></a>
                    </div>
                    <div class='card-content'>
                      <p >Escrito por: <span class='coral'>$users[nombre] $users[apellido]</span>
                    </div>
                  </div>
                </div>
                ";
            }
        }
    }

    function getNote(){
        $conexion = new Database();
        if(isset($_GET['idNote'])){
            $id_nota = $_GET['idNote'];
            
            $note = "SELECT * FROM notas WHERE id = '$id_nota'";
            $query1 = $conexion->query($note);
            
            while($row = $query1->fetch_array()){
                $writer = "SELECT * FROM usuarios WHERE id = '$row[id]'";
                $query2 = $conexion->query($writer);

                while($users = $query2->fetch_array()){
                    $cat = "SELECT * FROM categorias where id = '$row[id_categoria]'";
                    $query3 = $conexion->query($cat);

                    while($category = $query3->fetch_array()){
                        echo "
                        <div class='card-panel'>
                            <h4>$row[titulo]</h4>
                            <div class='descripcion'>
                                <img src='../assets/img/$row[foto]' width='300' />

                                <p>$row[descripcion]</p>
                            </div>
                            
                            <div class='footer-copyright copy'>
                                Escrito por: <div class='chip'>$users[nombre] $users[apellido]</div>
                                Fecha de publicación: <div class='chip'>$row[fecha]</div>
                                Categoría: <div class='chip'>$category[nombre]</div>
                            </div>
                        </div>
                    ";
                    }
                    
                }
            }
        }
    }
    function dataCreateComent($descripcion, $fecha){
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    function createComent(){
        $conexion = new Database();
        if(isset($_GET['idNote'])){
            $id_nota = $_GET['idNote'];

            $user_id = "SELECT * FROM usuarios where correo = '$_SESSION[correo]'";
            $query1 = $conexion->query($user_id);
    
            while($row1 = $query1->fetch_array()){
                $insert = "INSERT INTO comentarios(descripcion,fecha,id_usuario,id_nota)
                VALUES('$this->descripcion','$this->fecha','$row1[id]','$id_nota')";
            
                $query3 = $conexion->query($insert);

                if($query3){
                    echo "Se envió tu comentario";
                }else{
                    echo "Hubo un error al publicar tu comentario " . $conexion->error;
                }
            }
        }
    }

    function getAllComents(){
        $conexion = new Database();

        if(isset($_GET['idNote'])){
            $id_nota = $_GET['idNote'];

            $coment = "SELECT * FROM comentarios WHERE id_nota = '$id_nota'";
            $query1 = $conexion->query($coment);

            while($row1 = $query1->fetch_array()){
                $users = "SELECT * FROM usuarios WHERE id = '$row1[id_usuario]'";
                $query2 = $conexion->query($users) or trigger_error($conexion->error);

                while($row2 = $query2->fetch_array()){
                    echo "
                        <div class='card-panel'>
                            <span class='coral'>$row2[nombre] $row2[apellido]</span><br>
                            <span class='grey-text fecha'>$row1[fecha]</span>
                            <p>$row1[descripcion]</p>
                        </div>
                    ";
                }
            }
        }
    }

    function getAllCategories(){
        $conexion = new Database();
        if(isset($_GET['idCategory'])){
            $id_categoria = $_GET['idCategory'];
            $query = "SELECT * FROM notas WHERE id_categoria = '$id_categoria'";
            $execute = $conexion->query($query);

            $count = mysqli_num_rows($execute);
            if($count == 0){
                echo "No se encontró ninguna nota con esta categoría";
            }else{
                while($row = $execute->fetch_array()){
                    $writer = "SELECT * FROM usuarios WHERE id = '$row[id]'";
                    $query2 = $conexion->query($writer);
        
                    while($users = $query2->fetch_array()){
                        echo "
                        <div class='col s10 m4'>
                          <div class='card carta hoverable'>
                            <div class='card-image'>
                              <img src='../assets/img/$row[foto]'>
                              <span class='card-title'>$row[titulo]</span>
                              <a href='index.php?idNote=$row[id]' class='btn-floating pulse halfway-fab waves-effect waves-light cyan darken-2'><i class='material-icons'>add</i></a>
                            </div>
                            <div class='card-content'>
                              <p >Escrito por: <span class='coral'>$users[nombre] $users[apellido]</span>
                            </div>
                          </div>
                        </div>
                        ";
                    }
                }
            }
        }
    }

}

?>