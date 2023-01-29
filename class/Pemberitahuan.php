<?php
include_once("Database.php");
class Pemberitahuan {
    private $db;
    
    public function __construct ()
    {
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM pemberitahuan WHERE status='aktif'";

        $db = new Database;
        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM pemberitahuan WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $isi = $data['isi'];
        $status = $data['status'];
        $sql = "INSERT INTO pemberitahuan (isi,status) VALUES ('$isi','$status')";
        
        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan pemberitahuan";
    }

    public function update ($id, $data){
        $isi = $data['isi'];
        $status = $data['status'];
        $sql = "UPDATE pemberitahuan SET isi='$isi' , status ='$status' WHERE id ='$id'";
        
        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA";
        }
        return "DATA GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE pemberitahuan SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            echo "BERHASIL MENGHAPUS DATA";
        } else {
            echo "DATA GAGAL DI HAPUS"; 
        }
    }

    public function __destruct()
    {

    }
}

?>