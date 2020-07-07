<?php

include './koneksi.php';
$msg='';

if(isset($_POST['simpan'])) 
{
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $golongan = $_POST['golongan'];
    $gaji = $_POST['gaji'];
    $alamat = $_POST['alamat'];
    
    $q = "INSERT INTO pegawai VALUES ('".$kode."','".$nama."','".$umur."','".$golongan."','".$gaji."','".$alamat."')";
    
    $r = mysqli_query($koneksi, $q) or die(mysqli_error());
    
    if($r){
        $msg = "Data Berhasil Ditambahkan";
        header("location:tampil.php");
    
    }
    else{$msg = "Data Tidak Berhasil Ditambahkan";}
}
?>

<form action="tambah.php" method="POST">
    <fieldset>
        <legend>Form Tambah Pegawai</legend>
        <table>
            <?php
            if($msg!=''){
                echo "<tr><td></td> <td></td> <td>$msg</td></tr>";
            }
            ?>
            
            <tr>
                <td>
                    Kode Pegawai
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="kode" size="10">
                </td>
            </tr>
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    Umur
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="umur">
                        <?php
                        for($i=20;$i<=50;$i++){
                            echo "<option value'".$i."'>".$i."</option>";
                        }
                        ?>
                    </select> Tahun
                </td>
            </tr>
            <tr>
                <td>
                    Golongan
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="golongan">
                        <?php
                        for ($char = "A"; $char <= "Z"; $char++) 
                        {
                        echo "<option value'".$char."'>".$char."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Gaji
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="gaji">
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="alamat">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <input type="submit" name="simpan" value="Simpan">
                    <input type="reset" name="simpan" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</form>