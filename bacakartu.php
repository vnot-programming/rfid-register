<?php
    include "koneksi.php";
    $sql = mysqli_query($konek,"select*from status_alat");
    $data = mysqli_fetch_array($sql);
    $mode = $data['mode'];
    $jenis_mode = "";
    if ($mode == 1) $jenis_mode = "Masuk";
    elseif ($mode == 2) $jenis_mode = "Istirahat";
    elseif ($mode == 3) $jenis_mode = "Kembali";
    elseif ($mode == 4) $jenis_mode = "Pulang";

    $baca_kartu = mysqli_query($konek,"select*from tmprfid");
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu    = $data_kartu['nokartu'];
?>
<div class="container-fluid" style="text-align: center;">
    <?php if($nokartu == "") {?>
    <h3>Mode : <?php echo $jenis_mode ?></h3>
    <h3>Silahkan Tempelkan Kartu RFID Anda</h3>
    <img src="images/rfid.png" style="width:200px">
    <br>
    <img src="images/animasi2.gif" style="width:200px">
    <?php } else {
        $cari_karyawan = mysqli_query($konek,"select*from karyawan
        where nokartu = '$nokartu'");
        $juml_data = mysqli_num_rows($cari_karyawan);
        if($juml_data == 0){
            echo "<h1>Kartu Tidak Kenali !!!</h1>";
        }else{
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');
            $cari_absen = mysqli_query($konek,"select*from absensi 
                where nokartu='$nokartu' and tanggal='$tanggal'");
            $juml_absen = mysqli_num_rows($cari_absen);
            if ($juml_absen == 0){
                echo "<h1>Welcome <br> $nama<h1>";
                mysqli_query($konek,"insert into absensi(nokartu,tanggal,jam_masuk) 
                    values ('$nokartu','$tanggal','$jam')");
            }else{
                if($mode==2){
                    echo "<h1>Selamat Istirahat <br> $nama</h1>"; 
                    mysqli_query($konek, "update absensi set jam_istirahat = '$jam' 
                        where nokartu='$nokartu' and tanggal ='$tanggal'");
                }elseif($mode==3){
                    echo "<h1>Selamat Datang Kembali <br> $nama</h1>"; 
                    mysqli_query($konek, "update absensi set jam_kembali = '$jam' 
                        where nokartu='$nokartu' and tanggal ='$tanggal'");
                }elseif($mode==4){
                    echo "<h1>Selamat Jalan <br> $nama</h1>"; 
                    mysqli_query($konek, "update absensi set jam_pulang = '$jam' 
                        where nokartu='$nokartu' and tanggal ='$tanggal'");
                }
            }
        }

        mysqli_query($konek,"delete from tmprfid");
    }?>
</div>