<?php
session_start();
session_destroy();
header("Location: ../views/iniciarsesionLOGIN.php");
exit;
?>