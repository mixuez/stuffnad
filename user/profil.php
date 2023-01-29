<?php
include_once('../class/User.php');

$user = new User;
$data_user = $user->find(2);

if(isset($_POST["submit"])){
    $data = [
        
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash ($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],

    ];

    $user->update($_POST['id_user'], $data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
</head>
<body>
    <?php include('../sidebar.php'); ?>

    <div class="profil">
        <form action="" method="POST" enctype="multipart/form-data">\
            <table border="1">
                <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">
                <tr>
                    <th>Foto</th>
                    <td>
                        <input type="file" name="foto">
                    </td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                        <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <input type="text" name="username" value="<?= $data_user["username"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input type="text" name="password" value="<?= $data_user["password"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <input type="text" name="alamat" value="<?= $data_user["alamat"] ?>">
                    </td>
                </tr>
            </table>

            <button type="submit" name="submit">SIMPAN</button>
        </form>
    </div>
    
</body>
</html>