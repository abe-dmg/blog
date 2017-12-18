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
    $conexion->query($delete);
    if($conexion){
        header('Location: ../../views/admin/panel.php?showNotes');
    }else{
        echo "Error " . $conexion->error;
    }
}else if(isset($_GET['idUsuario'])){
    $id_usuario = $_GET['idUsuario'];

    $deleteNote = "DELETE FROM usuarios WHERE id = $id_usuario";
    $res = $conexion->query($deleteNote);
    if($res){
        header('Location: ../../views/admin/panel.php?showUsers');
    }else{
        echo "Error " . $conexion->error;
    }
}
?>