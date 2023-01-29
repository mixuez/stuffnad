<?php
include_once("Database.php");
class Identitas {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM identitas";

        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM identitas WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $nomor_hp = $data['nomor_hp'];
        $sql = "INSERT INTO identitas (nama,alamat,email,nomor_hp) VALUES ('$nama','$alamat','$email','$nomor_hp')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan identitas";
    }

    public function update ($id, $data){
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $nomor_hp = $data['nomor_hp'];
        $sql = "UPDATE identitas SET nama='$nama' , alamat ='$alamat', email='$email' , nomor_hp ='$nomor_hp' WHERE id ='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA";
        }
        return "DATA GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE identitas SET deleted_at = '$date' WHERE id='$id'";

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