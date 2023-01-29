<?php
include_once("Database.php");
class Kategori {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM kategori";

        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM kategori WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $sql = "INSERT INTO kategori (kode,nama) VALUES ('$kode','$nama')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan kategori";
    }

    public function update ($id, $data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $sql = "UPDATE kategori SET kode='$kode' , nama ='$nama' WHERE id ='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA";
        }
        return "DATA GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE kategori SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            echo "BERHASIL MENGHAPUS DATA";
        } else {
            echo "DATA GAGAL DI HAPUS"; 
        }
    }

    public function __destruct ()
    {
        
    }
}

?>