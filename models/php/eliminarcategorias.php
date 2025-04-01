<?php

$id = $_GET['id'];
include_once '../config/conexion.php';
$query = "DELETE FROM categorias WHERE idcategoria = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);

$response = [];
if ($stmt->execute()) {
    echo "<script language='JavaScript'>
            alert('Los datos se eliminaron correctamente de la BD');
            location.assign('../views/vercategorias.php');
            </script>";
} else {
    echo "<script language='JavaScript'>
            alert('Los datos NO se eliminaron de la BD');
            location.assign('../views/vercategorias.php');
            </script>";
}

$stmt->close();
$conexion->close();
?>