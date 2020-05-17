<?php 
include_once("konfigurasi.php");
include_once("fungsidatamhs.php");

$syarat = "NIM='12345678'";
$hx = deldtmhs($syarat);
if($hx){
    echo "Delete Data Sukses";
}else{
    echo "Delete Data Gagal";
}
?>