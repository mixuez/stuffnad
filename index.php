<?php 
include("connect.php");
include_once ("class/Kategori.php");

header ("location: /user/index.php "); //sementara
// $kategori = new Kategori;
// $data_kategori = new Kategori;
// $data_kategori =  $data_kategori->all();

// foreach($data_kategori as $kategori){
//     echo $kategori ["kode"] . "." . $kategori ["nama"] . "<br>";
// }

// $umum = $data_kategori->find(1);
// echo $umum["nama"];

// $data = [
//     "kode" => "horror" ,
//     "nama" => "Horror"
// ];

// $tambah_kategori = $kategori->create($data);
// echo $tambah_kategori;

// $data = [
//     "kode" => "mistis" ,
//     "nama" => "Mistis"
// ];

// $id_yang_mau_diubah = "5";

// $edit_kategori = $kategori->update($id_yang_mau_diubah, $data);
// echo "$edit_kategori";

// $id_yang_mau_dihapus = "5";

// $hapus_kategori = $kategori->delete($id_yang_mau_dihapus);
// echo "$hapus_kategori";

?>