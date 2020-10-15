<?php include_once "../base.php";

$_POST['priority']=serialize($_POST['priority']);
print_r($_POST);
$Admin->save($_POST);

to("../admin.php?do=admin");
?>