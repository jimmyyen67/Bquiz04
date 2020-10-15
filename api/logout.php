<?php include_once "../base.php";

switch($_GET['logout']){
    case "admin":
        unset($_SESSION['b04admin']);
    break;
    case "member":
        unset($_SESSION['b04member']);
        
    break;
}

to("../index.php");
?>