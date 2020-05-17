<?php
$IDPAGE = "dashboard";
if(isset($_GET['id'])){
    $IDPAGE = $_GET['id'];
}
switch($IDPAGE){
    case "dashboard":
        break;
    case "mhs" :
        include_once("mhs.php"); 
        break;
}
?>