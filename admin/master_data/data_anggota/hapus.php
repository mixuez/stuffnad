<?php 
include_once('../../../class/User.php');

$user = new User;

$delete = $_GET['delete'];

    $user->delete($delete);

    header('location:index.php');



?>