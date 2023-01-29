<?php
include_once("Database.php");
class Penerbit {
    private $db; 

    public function __construct () {
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM penerbit";

        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM penerbit WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $verif = $data['verif'];
        $sql = "INSERT INTO penerbit (kode,nama, verif) VALUES ('$kode','$nama','$verif')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan penerbit";
    }

    public function update ($id, $data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $verif = $data['verif'];
        $sql = "UPDATE penerbit SET kode='$kode' , nama ='$nama', verif='$verif' WHERE id ='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA";
        }
        return "DATA GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE penerbit SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            echo "BERHASIL MENGHAPUS DATA";
        } else {
            echo "DATA GAGAL DI HAPUS"; 
        }
    }

    public function __destruct(){

    }
}

?>