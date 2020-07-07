<?php

//MEMANGGIL FILE KONEKSI
include "./koneksi.php";

//MENDEFINISIKAN NILAI LIMIT
$lim = 4;

//MENDEFINISIKAN HALAMAN PERTAMA
$hal = array_key_exists('hal', $_GET)? $_GET['hal'] : 0;

//QUERY UNTUK MENDAPATKAN JUMLAH SELURUH ROW
$sql = "select * from pegawai";
$res = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$jml = mysqli_num_rows($res);

//MENGHITUNG MAKSIMAL HALAMAN
$max = ceil($jml/$lim);

//MELAKUKAN QUERY LIMIT
$sqlLimit = "SELECT * FROM pegawai LIMIT $hal, $lim";
$resLimit = mysqli_query($koneksi, $sqlLimit) or die(mysqli_error($koneksi));

?>

<table border ="1" width="100%" cellpadding="3" cellspacing="0" style="bordercollapse:collapse">
    <tr align="center">
        <th>No</th>
        <th> Kode Pegawai </th>
        <th> Nama </th>
        <th> Umur </th>
        <th> Golongan </th>
        <th> Gaji </th>
        <th> Alamat </th>
        <th> Edit </th>
        <th> Hapus </th>
    </tr>
    
    
 <?php
 $i=1+$hal;
 while ($data = mysqli_fetch_array($resLimit)){
     if($i%2==0) $bg='#cccccc';
     else $bg='#ffffff';
     
    echo "<tr bgcolor = ' " .$bg."'>
        <td> ".$i."</td>
        <td>" .$data["kode"]."</td>
        <td>" .$data["nama"]."</td>
        <td>" .$data["umur"]."</td>
        <td>" .$data["golongan"]."</td>
        <td>" .$data["gaji"]."</td>
        <td>" .$data["alamat"]."</td>
        <td><a href=edit.php?kode=".$data["kode"].">Edit</a></td>
        <td><a href=hapus.php?kode=".$data["kode"].">Hapus</a></td>
        </tr>";
    $i++;
 }
 ?>
</table>
<table width="100%">
    <tr>
        <td>
            Jumlah Data : <?php echo $jml; ?>
        </td>
        <td align="right">
            Halaman : 
            <?php
                for($h=1;$h<=$max;$h++){
                  $list[$h] = $lim * $h - $lim;
                  echo "<a href='?hal=".$list[$h]."'>".$h."</a>";
                }
            ?>
        </td>
    </tr>
</table>
