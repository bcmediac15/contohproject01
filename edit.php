<?php 
include_once("konfigurasi.php");
include_once("fungsidatamhs.php");

$lsupdate = "ALAMAT='Ubah Alamat Lagi'";
$syarat = "NIM='12345678'";
$hx = updatedtmhs($lsupdate,$syarat);
if($hx){
    echo "Update Data Sukses";
}else{
    echo "Update Data Gagal";
}
?>