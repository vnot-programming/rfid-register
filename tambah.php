<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Tambah Data</title>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            },1000);
        });
    </script>
</head>
<body>
    <?php
        include "koneksi.php";
        if(isset($_POST['btnSimpan'])){
            $nokartu = $_POST['nokartu'];
            $nama = $_POST['nama'];

            $simpan = mysqli_query($konek, 
                "insert into karyawan(nokartu,nama)
                values ('$nokartu','$nama')");

            if ($simpan){
                echo "
                    <script>
                        alert('Berhasil Simpan Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }else{

                echo "
                    <script>
                        alert('Gagal Simpan Data');
                        location.replace('datakaryawan.php');
                    </script>
                ";
            }
        }
        
        mysqli_query($konek,"delete from tmprfid");
    ?>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h3>Tambah Data</h3>

        <form method="POST">
            <div id="norfid"></div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama"
                placeholder="Masukan Nama" 
                class="form-control" 
                style="width: 200px;">
            </div>

            <button class="btn btn-primary" 
                name="btnSimpan" id="btnSimpan">
            Simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
    
</body>
</html>