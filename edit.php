<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Edit Data</title>
</head>
<body>
    <?php
        include "koneksi.php";
        $id = $_GET['id'];
        $cariData = mysqli_query($konek, 
                "select*from karyawan where id = '$id'");
        $hasil = mysqli_fetch_array($cariData);
        if(isset($_POST['btnSimpan'])){
            $nokartu = $_POST['nokartu'];
            $nama = $_POST['nama'];

            $simpan = mysqli_query($konek, 
                "update karyawan set 
                nokartu = '$nokartu', 
                nama = '$nama' 
                where id = '$id'");

            if ($simpan){
                echo "
                    <script>
                        alert('Berhasil Mengubah Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }else{

                echo "
                    <script>
                        alert('Gagal Mengubah Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }
        }
    ?>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h3>Edit Data</h3>

        <form method="POST">
            <div class="form-group">
                <label>No. Kartu</label>
                <input type="text" name="nokartu" id="nokartu"
                placeholder="Nomor Kartu RFID" 
                class="form-control" 
                style="width: 200px;"
                value="<?php echo $hasil['nokartu'];?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama"
                placeholder="Masukan Nama" 
                class="form-control" 
                style="width: 200px;"
                value="<?php echo $hasil['nama'];?>">
            </div>

            <button class="btn btn-primary" 
                name="btnSimpan" id="btnSimpan">
            Simpan Perubahan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
    
</body>
</html>