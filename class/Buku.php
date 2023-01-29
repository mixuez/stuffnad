<?php
include_once("Database.php");
class Buku {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM buku";

        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM buku WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $judul = $data['judul'];
        $kategori = $data['kategori'];
        $nama_penerbit = $data ['nama_penerbit'];
        $pengarang = $data ['pengarang'];
        $tahun_terbit = $data ['tahun_terbit'];
        $isbn = $data ['isbn'];
        
        $sql = "INSERT INTO buku (judul,kategori, nama_penerbit, pengarang, tahun_terbit, isbn) VALUES ('$judul','$kategori', '$nama_penerbit', '$pengarang', '$tahun_terbit', '$isbn')";
        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan buku";
    }

    public function update ($id, $data){
        $judul = $data['judul'];
        $kategori = $data['kategori'];
        $nama_penerbit = $data ['nama_penerbit'];
        $pengarang = $data ['pengarang'];
        $tahun_terbit = $data ['tahun_terbit'];
        $isbn = $data ['isbn'];
        $sql = "UPDATE buku SET judul='$judul' , kategori ='$kategori', nama_penerbit='$nama_penerbit' , pengarang ='$pengarang' , tahun_terbit='$tahun_terbit' , isbn ='$isbn' WHERE id ='$id'";
        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE BUKU";
        }
        return "BUKU GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE buku SET deleted_at = '$date' WHERE id='$id'";

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