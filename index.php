<?php
session_start();
include_once("konfigurasi.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Judul</title>
        <link rel="stylesheet" href="style-min.css">
        
    </head>
    <body>
        <div class="konten">
            <div class="head">
                <h1>Data Nilai Mahasiswa</h1>
                <div class="menubar">
                    <a href='index.php'>dashboard</a> 
                    <a href='index.php?id=mhs'>Mahasiswa</a> 
                    <a href='index.php?id=dsn'>Dosen</a> 
                    <a href='index.php?id=mk'>Matakuliah</a> 
                    <a href='index.php?id=out'>Logout</a> 
                </div>
            </div>
            <div class="bodykonten">
            <?php include_once("loadpage.php"); ?>
            </div>
            <div class="footer">
                <div class="copyright">2020 web1</div>
            </div>
        </div>
    </body>
</html>