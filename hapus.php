<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $hapus = mysqli_query($konek, "delete from karyawan where id = '$id'");
    if ($hapus){
                echo "
                    <script>
                        alert('Berhasil Hapus Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }else{

                echo "
                    <script>
                        alert('Gagal Hapus Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }
?>