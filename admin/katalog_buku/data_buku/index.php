<?php

include_once('../../../class/Buku.php');
include_once('../../../class/User.php');

$buku = new Buku;
$data_buku = $buku->all();

$user = new User;
$data_user = $user->find(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
    <?php include ('../../sidebar.php'); ?>

    <div class="data_buku">
        <h3>Data Buku</h3>
        <a href="tambah.php">Tambah</a>

        <table border="1">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Nama Penerbit</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Jumlah Buku Baik</th>
                <th>Jumlah Buku Rusak</th>
                <th>Aksi</th>
            </tr>
            <?php
            foreach($data_buku as $key => $buku){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $buku["judul"] ?></td>
                    <td><?= $buku ["kategori"] ?></td>
                    <td><?= $buku ["nama_penerbit"] ?></td>
                    <td><?= $buku ["pengarang"] ?></td>
                    <td><?= $buku ["tahun_terbit"] ?></td>
                    <td><?= $buku ["isbn"] ?></td>
                    <td><?= $buku ["j_buku_baik"] ?></td>
                    <td><?= $buku ["j_buku_rusak"] ?></td>
                    <td>
                        <a href="edit.php?=<?= $b["id"] ?>">Edit</a>
                        <a href="hapus.php?delete=<?= $buku['id'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    
</body>
</html>