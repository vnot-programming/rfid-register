<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Rekap Data</title>
</head>
<body>
    <?php
        include "koneksi.php";
    ?>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h3>Rekap Data</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color:white">
                    <th style="width: 10px; text-align:center">No.</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">Jam Masuk</th>
                    <th style="text-align:center">Jam Istirahat</th>
                    <th style="text-align:center">Jam Kembali</th>
                    <th style="text-align:center">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    $sql = mysqli_query($konek,"select b.nama, a.tanggal, 
                        a.jam_masuk, a.jam_istirahat, a.jam_kembali, 
                        a.jam_pulang from absensi a, karyawan b
                        where a.nokartu = b.nokartu and a.tanggal = '$tanggal'");

                    $no = 0;
                    while($data = mysqli_fetch_array($sql)){
                        $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['jam_masuk']; ?></td>
                    <td><?php echo $data['jam_istirahat']; ?></td>
                    <td><?php echo $data['jam_kembali']; ?></td>
                    <td><?php echo $data['jam_pulang']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include "footer.php"; ?>
    
</body>
</html>