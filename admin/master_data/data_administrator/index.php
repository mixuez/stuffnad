<?php

include_once('../../../class/User.php');

$user = new User;
$data_user = $user->find(1);

$admin = new User;
$data_admin = $admin->getAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data admin</title>
</head>
<body>
    <?php include ('../../sidebar.php'); ?>

    <div class="data_admin">
        <h3>Data admin</h3>
        <a href="tambah.php">Tambah</a>

        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Terakhir Login</th>
                <th>Aksi</th>
            </tr>
            <?php
            foreach($data_admin as $key => $admin){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $admin ["fullname"] ?></td>
                    <td><?= $admin ["username"] ?></td>
                    <td><?= $admin ["terakhir_login"] ?></td>
                    <td>
                        <a href="edit.php">Edit</a>
                        <a href="hapus.php">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    
</body>
</html>