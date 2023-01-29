<?php
include_once('../../../class/User.php');

$user = new User;
$data_user = $user->find(12);

if(isset($_POST["update"])){
    $data = [
        
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash ($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "verif" => $_POST["verif"],

    ];


    $user->update($_POST['id_user'], $data);
    echo "Update Berhasil";
    header('location:index.php');
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
                    <th>Kode User</th>
                    <td>
                        <input type="text" name="kode" value="<?= $data_user["kode"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <td>
                        <input type="text" name="nis" value="<?= $data_user["nis"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Fullname</th>
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
                        <input type="password" name="password" value="<?= $data_user["password"] ?>">
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
                        <input type="textarea" name="alamat" value="<?= $data_user["alamat"] ?>">
                    </td>
                </tr>
                <tr>
                <th>Verifikasi</th>
                <td><select name="verif" id="">
                <option value="" disabled selected>-- Pilih Opsi --</option>
                <option value="VERIFIED" <?= ($data_user['verif'] == "VERIFIED") ? 'selected' : ' ' ?>>VERIFIED</option>
                <option value="UNVERIFIED" <?= ($data_user['verif'] == "UNVERIFIED") ? 'selected' : ' ' ?>>UNVERIFIED</option>
                </select></td>              
            </tr>
            </table>

            <button type="update" name="update">SIMPAN</button>
        </form>
    </div>
    
</body>
</html>