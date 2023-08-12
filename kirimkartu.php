<?php
    include "koneksi.php";

    $nokartu = $_GET['nokartu'];

    mysqli_query($konek,"delete from tmprfid");

    $simpan = mysqli_query($konek,"insert into tmprfid (nokartu) values ('$mode_absen')");
    if ($simpan) {
        echo "OK Berhasil Kirim";
    }else{
        echo "GAGAL Kirim";
    }
?>