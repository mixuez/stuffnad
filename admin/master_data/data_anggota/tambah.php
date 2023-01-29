<?php
include_once("../../../class/User.php");


if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash ($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "verif" => $_POST["verif"],
        "role" => $_POST["role"],
        "join_date" => $_POST ["join_date"],

    ];

    $user = new User;
    $submit = $user->create($data);
    echo $submit;
    header('location:index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM Tambah Anggota</title>
</head>
<body>

    <div class="form_tambah_anggota">
<form action="" method="POST">
    <h3>Form Tambah Angota</h3>
    <table>
			<tr>
                <td>Kode User</td>
				<td><input type="text" name="kode"></td>					
			</tr>	
			<tr>
				<td>NIS</td>
				<td><input type="text" name="nis"></td>					
			</tr>	
			<tr>
				<td>Fullname</td>
				<td><input type="text" name="fullname"></td>					
			</tr>	
            <tr>
                <td>Username</td>
				<td><input type="text" name="username"></td>					
			</tr>	
            <tr>
                <td>Password</td>
				<td><input type="password" name="password"></td>					
			</tr>	
            <tr>
                <td>Kelas</td>
				<td><input type="text" name="kelas"></td>					
			</tr>	
            <tr>
                <td>Alamat</td>
				<td><input type="textarea" name="alamat"></td>					
			</tr>
            <tr>
                <td>Verifikasi</td>
				<td><input type="text" name="verif" value="VERIFIED"></td>					
			</tr>
            <tr>
                <td>Role</td>
                <td><select name="role" id="">
                <option value="" disabled selected>-- Pilih Opsi --</option>
                <option value="user">User</option>
                </select></td>              
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="date" name="join_date"></td>
            </tr>				
		</table>
    <button type="submit" name="submit">SUBMIT</button>
</form>
</div>
</body>
</html>