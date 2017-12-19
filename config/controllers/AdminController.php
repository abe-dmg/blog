<?php 
include('../../config/model/database.php');

class AdminController{
    private $titulo, $descripcion, $foto, $foto_tmp, $relevante, $claves, $categoria, $fecha;
    private $nombre;

    public $id_categoria;
    public function getCurrentUser(){
        if(!isset($_SESSION['correo'])){
            echo "
                <li><a href='index.php?userLogin'>Inicia sesión</a></li>
                <li><a href='index.php?userSignup'>Regístrate</a></li>
            ";
        }else{
            echo "<li><a href='../../config/controllers/eliminar.php?cerrar_sesion'>Cerrar sesión</a></li>";
        }    
    }
    

    public function getCategories(){
        $conexion = new Database();
        $query = "SELECT * FROM categorias";
        $execute = $conexion->query($query);
        while($row = $execute->fetch_array()){
            echo "
                <option value = '$row[id]'>$row[nombre]</option>
            ";
        }
    }

    public function noteData($titulo, $descripcion, $foto, $foto_tmp, $categoria, $relevante, $claves, $fecha){
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
        $this->foto_tmp = $foto_tmp;
        $this->categoria = $categoria;
        $this->relevante = $relevante;
        $this->claves = $claves;
        $this->fecha = $fecha;
    }

    public function uploadData(){
        $conexion = new Database();

        move_uploaded_file($this->foto_tmp,"../../assets/img/$this->foto");

        $user_id = "SELECT * FROM usuarios WHERE correo = '$_SESSION[correo]'";
        $userQuery = $conexion->query($user_id);
        while($rowId = $userQuery->fetch_array()){
            $id_usuario = $rowId['id'];
        }

        $query = "INSERT INTO notas(titulo,descripcion,foto,id_usuario,id_categoria,relevante,palabras_clave,fecha) 
                VALUES('$this->titulo','$this->descripcion','$this->foto','$id_usuario','$this->categoria', '$this->relevante',
                '$this->claves','$this->fecha')";
        $execute = $conexion->query($query);

        if($execute){
            echo "<div class='card-panel light-green lighten-1 white-text'>El articulo se publicó correctamente</div>";
        }else{
            echo "
                <div class='card-panel red lighten-1 white-text'>Hubo un error al completar tu registro:  " .$conexion->error. "</div>
            ";
        }
    }

    public function showNotes(){
        $conexion = new Database();

        $query = "SELECT * FROM notas";
        $execute = $conexion->query($query);
        while($row = $execute->fetch_array()){
            echo "
                <tr>
                    <td>$row[titulo]</td>
                    <td>$row[relevante]</td>
                    <td><a href='../../config/controllers/eliminar.php?id=$row[id]'>Eliminar</a></td>
                </tr>
            ";
        }
    }

    public function showUsers(){
        $conexion = new Database();

        $query = "SELECT * FROM usuarios";
        $execute = $conexion->query($query);
        while($row = $execute->fetch_array()){
            echo "
                <tr>
                    <td>$row[nombre]</td>
                    <td>$row[apellido]</td>
                    <td>$row[nivel]</td>
                    <td><a href = '../../config/controllers/eliminar.php?idUsuario=$row[id]'>Eliminar</a></td>
                </tr>
            ";
        }
    }

    public function dataCategory($nombre){
        $this->nombre = $nombre;
    }
        
    public function uploadCategory(){
        $conexion = new Database();
        $query = "INSERT INTO categorias(nombre) VALUES ('$this->nombre')";
        $execute = $conexion->query($query);

        if($execute){
            echo "
                <div class='card-panel light-green lighten-1 white-text'>Se añadió correctamente la categoría</div>
            ";
        }else{
            echo "
                <div class='card-panel red lighten-1 white-text'>Hubo un error al añadir la categoría</div>
            ";
        }
    }

    public function showCategories(){
        $conexion = new Database();
        $query = "SELECT * FROM categorias";
        $execute = $conexion->query($query);
        while($row = $execute->fetch_array()){
            echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[nombre]</td>
                    <td><a href = '../../config/controllers/eliminar.php?idCategory=$row[id]'>Eliminar</a></td>
                </tr>
            ";
        }

    }

}
?>