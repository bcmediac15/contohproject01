<?php
//membuat kumpulan fungsi untuk aplikasi data mahasiswa

//Fungsi    : dbkonek
//parameter : host, username, password, database
//output    : status koneksi
//membuat koneksi ke DBMS mySQL dengan output true jika terkoneksi dan false jika gagal
function dbkonek($host,$user,$pwd,$db){
    $hsl = false;
    $hsl = mysqli_connect($host, $user, $pwd, $db);
    return $hsl;
}

//Fungsi    : dbTutup
//parameter : Link koneksi
//output    : status koneksi
//Menutup koneksi dari DBMS mySQL dengan output true jika sukses menutup dan false jika gagal
function dbTutup($konek){
    $hsl = false;
    $hsl = mysqli_close($konek);
    return $hsl;
}

function createdtmhs($nim="",$nama="",$alamat="",$telp=""){
    $hsl = false;
    if(!($nim=="") && !($nama=="")){
        $sql = "INSERT INTO mahasiswa(NIM,NAMA,ALAMAT,TELP) VALUES('$nim','$nama','$alamat','$telp');";
        //echo $sql;die();
        $cnn = dbkonek(DBHOST,DBUSER,DBPWD,DBNAME);
        if($cnn){
            $dbinst = mysqli_query($cnn,$sql);
            if($dbinst){
                $hsl=true;
            }
        }
    }
    return $hsl;
}
//Fungsi    : listmhs
//parameter : cx
//output    : daftar data mahasiswa
//menampilkan data mahasiswea berdasarkan syarat nim atau nama mahasiswa
function readalldtmhs(){
    $hsl = array();
    $hsl['STT'] = false;
    $hsl['JREK'] = 0;
    $sql = "SELECT NIM, NAMA, ALAMAT, TELP FROM mahasiswa;";
    //membuka koneksi ke DBMS mySQL dengan fungsi dbkonek
    $cnn = dbkonek(DBHOST,DBUSER,DBPWD,DBNAME);
    if($cnn){
        $dbinst = mysqli_query($cnn,$sql);
        if($dbinst){
            $rek = 0;
            while($h=mysqli_fetch_array($dbinst)){
                $hsl[$rek]["NIM"] = $h["NIM"];
                $hsl[$rek]["NAMA"] = $h["NAMA"];
                $hsl[$rek]["ALAMAT"] = $h["ALAMAT"];
                $hsl[$rek]["TELP"] = $h["TELP"];
                $rek++;
            }
            $hsl['STT'] = true;
            $hsl['JREK'] = $rek;
        }
        $cls = dbtutup($cnn);
    }
    return $hsl;
}
function readnimdtmhs($nim){
    $hsl = array();
    $hsl['STT'] = false;
    $hsl['JREK'] = 0;
    $sql = "SELECT NIM, NAMA, ALAMAT, TELP FROM mahasiswa WHERE NIM='$nim';";
    //membuka koneksi ke DBMS mySQL dengan fungsi dbkonek
    $cnn = dbkonek(DBHOST,DBUSER,DBPWD,DBNAME);
    if($cnn){
        $dbinst = mysqli_query($cnn,$sql);
        if($dbinst){
            $rek = 0;
            while($h=mysqli_fetch_array($dbinst)){
                $hsl[$rek]["NIM"] = $h["NIM"];
                $hsl[$rek]["NAMA"] = $h["NAMA"];
                $hsl[$rek]["ALAMAT"] = $h["ALAMAT"];
                $hsl[$rek]["TELP"] = $h["TELP"];
                $rek++;
            }
            $hsl['STT'] = true;
            $hsl['JREK'] = $rek;
        }
        $cls = dbtutup($cnn);
    }
    return $hsl;
}
function updatedtmhs($nim,$nama,$alamat,$telp){
    $hsl = false;
    $sql = "UPDATE mahasiswa SET NAMA='" . $nama . "', ALAMAT='" . $alamat . "', TELP='" . $telp . "' WHERE NIM='". $nim . "';";
    $cnn = dbkonek(DBHOST,DBUSER,DBPWD,DBNAME);
    if($cnn){
        $dbinst = mysqli_query($cnn,$sql);
        if($dbinst){
            $hsl=true;
        }
    }
    return $hsl;
}
function deldtmhs($syarat=""){
    $hsl = false;
    $sql = "DELETE FROM mahasiswa WHERE NIM='" . $syarat . "';";
    $cnn = dbkonek(DBHOST,DBUSER,DBPWD,DBNAME);
    if($cnn){
        $dbinst = mysqli_query($cnn,$sql);
        if($dbinst){
            $hsl=true;
        }
    }
    return $hsl;
} 
?>