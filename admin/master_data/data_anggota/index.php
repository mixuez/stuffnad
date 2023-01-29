<?php

include_once('../../../class/User.php');

$user = new User;
$data_user = $user->find(1);

$anggota = new User;
$data_anggota = $anggota->getAnggota();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
</head>
<body>
    <?php include ('../../sidebar.php'); ?>

    <div class="data_anggota">
        <h3>Data Anggota</h3>
        <a href="tambah.php">Tambah</a>

        <table border="1">
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Verifikasi</th>
                <th>Aksi</th>
            </tr>
            <?php
            foreach($data_anggota as $key => $anggota){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $anggota["kode"] ?></td>
                    <td><?= $anggota ["nis"] ?></td>
                    <td><?= $anggota ["fullname"] ?></td>
                    <td><?= $anggota ["kelas"] ?></td>
                    <td><?= $anggota ["alamat"] ?></td>
                    <td><?= $anggota ["verif"] ?></td>
                    <td>
                        <a href="edit.php?edit=<?= $anggota["id"] ?>">Edit</a>
                        <a href="hapus.php?delete=<?= $anggota['id'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    
</body>
</html>