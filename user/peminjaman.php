<?php
include("../connect.php");
include_once ("../class/Peminjaman.php");

$peminjaman = new Peminjaman;
$data_peminjaman = new Peminjaman;
$data_peminjaman =  $peminjaman->find(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
</head>
<body>
    <?php include('../sidebar.php'); ?>
<div class="peminjaman">
    <h3>Buku Yang Dipinjam</h3>
    <a href="form_peminjaman.php">Tambah</a>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Kondisi Buku Saat Dipinjam</th>
            </tr>
            <?php
                foreach($data_peminjaman as $key => $peminjaman){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $peminjaman ["buku"]?></td>
                    <td><?= $peminjaman ["tanggal_peminjaman"] ?></td>
                    <td><?= $peminjaman ["kondisi_buku_saat_dipinjam"] ?></td>
                </tr>
                <?php
                }
            ?>    
        </table>
    </div>
</body>
</html>