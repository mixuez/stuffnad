<?php
include ("connect.php");
include_once ("../class/User.php");

$user = new User;

if(isset($_POST["register"])){
    $data = [
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "password_confirm" => $_POST["password_confirm"],
        "kelas" => $_POST["kelas"],
        "role" => $_POST["role"],
        
    ];

    $user = new User;
    $find = $user->find($id);
    echo "register";

    if($user->num_rows > 0){
        echo "<script> alert('Username sudah digunakan') ; </script>;"
    } else{
        if($password == $password_confirm){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $register = $user->create($data)


        }
    }

}

?>