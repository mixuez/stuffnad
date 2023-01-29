<?php

include_once('../class/User.php');
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');

$user = new User;
$data_user = $user->find(1);

$anggota = new User;
$data_anggota = $anggota->getAnggota();

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPeminjaman();

$pengembalian = new Peminjaman;
$data_pengembalian = $pengembalian->getPengembalian();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <?php include("sidebar.php"); ?>

    <table border="1">
        <tr>
            <th>Anggota</th>
            <th>Judul Buku</th>
            <th>Peminjaman</th>
            <th>Pengembalian</th>
        </tr>
        <tr>
            <td><?= count($data_anggota) ?></td>
            <td><?= count($data_buku) ?></td>
            <td><?= count($data_peminjaman) ?></td>
            <td><?= count($data_pengembalian) ?></td>
        </tr>
    </table>
</body>
</html>