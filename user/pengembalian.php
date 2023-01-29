<?php 
include_once('../class/Peminjaman.php');

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->findKembali(2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Buku</title>
</head>
<body>
    <?php include('../sidebar.php'); ?>

    <div class="peminjaman">
        <h3>Buku Yang Sudah Dikembalikan</h3>

        <table>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku Saat Dikembalikan</th>
            </tr>
            <?php
                foreach($data_peminjaman as $key => $pengembalian){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $pengembalian ["buku"]?></td>
                    <td><?= $pengembalian ["tanggal_pengembalian"] ?></td>
                    <td><?= $pengembalian ["kondisi_buku_saat_dikembalikan"] ?></td>
                </tr>
                <?php
                }
            ?>    
        </table>
    </div>
</body>
</html>