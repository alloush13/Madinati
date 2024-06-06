<?php

function isRole($role){
    if(!isset($_SESSION['role']) || $_SESSION['role'] != $role )
    header("Location: http://localhost/madinati/index.php");  
}




?>