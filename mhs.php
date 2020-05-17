<?php
include_once("fungsidatamhs.php");
$hsl = "";

if(isset($_POST['txNEW'])){
    $nim = $_POST['txNIM'];
    $nama = $_POST['txNAMA'];
    $alamat = $_POST['txALAMAT'];
    $telp = $_POST['txTELP'];
    $h = createdtmhs($nim,$nama,$alamat,$telp);
    if($h){
        $hsl = "Data Mahasiswa telah ditambahkan";
    }else{
        $hsl = "Data Mahasiswa gagal ditambahkan";    
    }
}
if(isset($_POST['txED'])){
    $nim = $_POST['txNIM'];
    $nama = $_POST['txNAMA'];
    $alamat = $_POST['txALAMAT'];
    $telp = $_POST['txTELP'];
    $h = updatedtmhs($nim,$nama,$alamat,$telp);
    if($h){
        $hsl = "Data Mahasiswa telah diubah";
    }else{
        $hsl = "Data Mahasiswa gagal diubah";    
    }
}
if(isset($_POST['txDEL'])){
    $nim = $_POST['txNIM'];
    $h = deldtmhs($nim);
    if($h){
        $hsl = "Data Mahasiswa telah dihapus";
    }else{
        $hsl = "Data Mahasiswa gagal dihapus";    
    }
}

$dtmhs = readalldtmhs();
$jdata = $dtmhs["JREK"];
$ketjdata = " : ". $jdata . " Data";
?>
<h1>Data mahasiswa</h1>

<?php
echo "<div class='pesan'>$hsl</div>";

if(isset($_GET['act'])){
    if($_GET['act']=="new"){
        echo "<h3>Menambah data Baru</h3>";
        echo "<form action='index.php?id=mhs' method='POST'>";
        echo "<div class='label'>NIM</div>";
        echo "<input class='txform' type='text' name='txNIM'>";
        echo "<div class='label'>Nama</div>";
        echo "<input class='txform' type='text' name='txNAMA'>";
        echo "<div class='label'>Alamat</div>";
        echo "<input class='txform' type='text' name='txALAMAT'>";
        echo "<div class='label'>Telp</div>";
        echo "<input class='txform' type='text' name='txTELP'>";
        echo "<div class='tombol'>";
        echo "<input class='cmdkirim' type='submit' name='cmdsimpan' value=' Simpan Data '>";
        echo "<input type='hidden' name='txNEW' value='1'>";
        echo "</div>";
        echo "</form>";
    }
    if($_GET['act']=="ed"){
        $dtedit = readnimdtmhs($_GET['nim']);
        if($dtedit['STT']){
            echo "<h3>Mengubah data</h3>";
            echo "<form action='index.php?id=mhs' method='POST'>";
            echo "<div class='label'>NIM</div>";
            echo "<input class='txform' type='text' name='txNIM1' value='".$dtedit[0]['NIM']."' disabled>";
            echo "<div class='label'>Nama</div>";
            echo "<input class='txform' type='text' name='txNAMA' value='".$dtedit[0]['NAMA']."'>";
            echo "<div class='label'>Alamat</div>";
            echo "<input class='txform' type='text' name='txALAMAT' value='".$dtedit[0]['ALAMAT']."'>";
            echo "<div class='label'>Telp</div>";
            echo "<input class='txform' type='text' name='txTELP' value='".$dtedit[0]['TELP']."'>";
            echo "<div class='tombol'>";
            echo "<input class='cmdkirim' type='submit' name='cmdsimpan' value=' Simpan Data '>";
            echo "<input type='hidden' name='txED' value='1'>";
            echo "<input type='hidden' name='txNIM' value='".$dtedit[0]['NIM']."'>";
            echo "</div>";
            echo "</form>";
        }
        
    }
    if($_GET['act']=="del"){
        $dtedit = readnimdtmhs($_GET['nim']);
        if($dtedit['STT']){
            echo "<h3>Menghapus data</h3>";
            echo "<form action='index.php?id=mhs' method='POST'>";
            echo "<div class='label'>NIM</div>";
            echo "<input class='txform' type='text' name='txNIM' value='".$dtedit[0]['NIM']."' disabled>";
            echo "<div class='label'>Nama</div>";
            echo "<input class='txform' type='text' name='txNAMA' value='".$dtedit[0]['NAMA']."' disabled>";
            echo "<div class='label'>Alamat</div>";
            echo "<input class='txform' type='text' name='txALAMAT' value='".$dtedit[0]['ALAMAT']."' disabled>";
            echo "<div class='label'>Telp</div>";
            echo "<input class='txform' type='text' name='txTELP' value='".$dtedit[0]['TELP']."' disabled>";
            echo "<div class='tombol'>";
            echo "<input class='cmdwarning' type='submit' name='cmdhps' value=' Hapus Data '>";
            echo "<input type='hidden' name='txDEL' value='1'>";
            echo "<input type='hidden' name='txNIM' value='".$dtedit[0]['NIM']."'>";
            echo "</div>";
            echo "</form>";
        }
    }
}
?>
<div class="datamhs">
<table class="demo-table">
<caption class="title">Data Mahasiswa<?=$ketjdata;?></caption>
<thead>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>TELPON</th>
        <th><a href="index.php?id=mhs&act=new">TAMBAHDATA</a></th>
    </tr>
</thead>
<tbody>
<?php

for($i=0;$i<=$jdata-1;$i++){
?>
    <tr>
        <td><?=$i+1;?>. </td>
        <td><?=$dtmhs[$i]['NIM'];?></td>
        <td><?=$dtmhs[$i]['NAMA'];?></td>
        <td><?=$dtmhs[$i]['ALAMAT'];?></td>
        <td><?=$dtmhs[$i]['TELP'];?></td>
        <td><a id="edata" href="index.php?id=mhs&act=ed&nim=<?=$dtmhs[$i]['NIM'];?>">Edit</a> <a class="lnkdel" href="index.php?id=mhs&act=del&nim=<?=$dtmhs[$i]['NIM'];?>">Hapus</td>
    </tr>
<?php
}
?>
</tbody>
</table>
</div>
