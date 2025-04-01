<?php
require_once 'conexion.php';

$id = $_GET['id'];
$query = "DELETE FROM proveedores WHERE idproveedores = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id);

$response = [];
if ($stmt->execute()) {
    echo "<script language='JavaScript'>
            alert('Los datos se eliminaron correctamente de la BD');
            location.assign('../html/verproveedor.php');
            </script>";
} else {
    echo "<script language='JavaScript'>
            alert('Los datos NO se eliminaron de la BD');
            location.assign('../html/verproveedor.php');
            </script>";
}

$stmt->close();
$conexion->close();
?>