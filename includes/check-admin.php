<?php
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin" )
header("Location: http://localhost/madinati/index.php");
?>