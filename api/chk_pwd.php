<?php include_once "../base.php";

$table=$_GET['table'];
$db=new DB($table);

$acc=$_GET['acc'];
$pwd=$_GET['pwd'];
$chk=$db->find(['acc'=>$acc,'pwd'=>$pwd]);
if(!empty($chk)){
    echo 1;
    //登入成功時，建立一個session用來存放登入者的資料
    $_SESSION[$table]=$acc;
}else{
    echo 0;
}
