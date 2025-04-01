<?php

$id = $_GET['id'];
include_once 'conexion.php';

$query = "DELETE FROM productos WHERE idproducto = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);

$response = [];
if ($stmt->execute()) {
    echo "<script language='JavaScript'> alert('El producto se eliminó correctamente de la BD'); 
    location.assign('../views/verproductos.php'); 
    </script>";
} else {
    echo "<script language='JavaScript'> alert('El producto NO se eliminó de la BD'); 
    location.assign('../views/verproductos.php'); 
    </script>";
}

$stmt->close();
$conexion->close();
?>