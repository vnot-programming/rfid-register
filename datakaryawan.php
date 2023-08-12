<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Data</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid" style="padding-top: 10%;">
        <h3>Data</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color:white;">
                    <th style="width: 10px; text-align:center">No.</th>
                    <th style="width: 200px; text-align:center">No. Kartu</th>
                    <th style="width: 400px; text-align:center">Nama</th>
                    <th style="width: 10px; text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php";

                    $sql = mysqli_query($konek,"select*from karyawan");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nokartu']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                        |
                        <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="tambah.php">
            <button class="btn btn-primary">Tambah Data</button>
        </a>
    </div>      

    <?php include "footer.php"; ?>
</body>
</html>