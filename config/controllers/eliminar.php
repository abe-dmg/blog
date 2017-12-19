<?php 
include('../../config/model/database.php');
$conexion = new Database();

if(isset($_GET['cerrar_sesion'])){
    if($_SESSION['correo'] == 'Administrador'){
        session_start();
        session_destroy();
        header('Location: ../../../views/index.php');
    }else{
        session_start();
        session_destroy();
        header('Location: ../../views/index.php');
    }
}elseif(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM notas WHERE id = '$id'";
    $conexion->query($delete) or trigger_error($conexion->error);
    if($conexion){
        header('Location: ../../views/admin/panel.php?showNotes');
    }else{
        echo "Error " . $conexion->error;
    }
}elseif(isset($_GET['idUsuario'])){
    $id_usuario = $_GET['idUsuario'];

    $deleteNote = "DELETE FROM usuarios WHERE id = $id_usuario";
    $res = $conexion->query($deleteNote);
    if($res){
        header('Location: ../../views/admin/panel.php?showUsers');
    }else{
        echo "Error " . $conexion->error;
    }
}elseif(isset($_GET['idCategory'])){
    $id_categoria = $_GET['idCategory'];
    $deleteCategory = "DELETE FROM categorias WHERE id = '$id_categoria'";
    $cat = $conexion->query($deleteCategory);
    if($cat){
        header('Location: ../../views/admin/panel.php?showCategories');
    }else{
        echo "<div class='card-panel red darken-1 white-text'>Error " . $conexion->error . "</div>";
    }
}
?>