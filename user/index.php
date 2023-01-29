<?php 
include("../connect.php");
include_once ("../class/Pemberitahuan.php");
include_once ("../class/Buku.php");


$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->all();

$buku = new Buku;
$data_buku = $buku->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
    <?php include('../sidebar.php'); ?>

    <div class="pemberitahuan">
        <?php

            foreach($data_pemberitahuan as $pemberitahuan) {
                ?>
                    <div class="alert alert-info">
                        <?=$pemberitahuan["isi"] ?>
                    </div>
                <?php
            }
        ?>    
    </div>

    <div class="buku">
        <table>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
            </tr>
            <?php
                foreach($data_buku as $key => $buku){
                ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $buku ["judul"] ?></td>
                    <td><?= $buku ["pengarang"]?></td>
                    <td><?= $buku ["nama_penerbit"] ?></td>
                </tr>
                <?php
                }
            ?>    
        </table>
    </div>
</body>
</html>