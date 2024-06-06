<?php
session_start();
if(isset($_SESSION['role']))
{
    if($_SESSION['role']!="guest"){
        $_SESSION['role']="guest";
        $_SESSION['id']="";

        
    }
}

header("Location: http://localhost/madinati/index.php");
?>