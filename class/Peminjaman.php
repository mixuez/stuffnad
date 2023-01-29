<?php
include_once("Database.php");
class Peminjaman {
    private $db;
    
    public function __construct () {
        $this->db = new Database;
    } 

    public function all () {
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NULL";

        return $this->db->connect()->query($sql)->fetch_all (MYSQLI_ASSOC);
    }

    public function getPeminjaman (){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NULL";

        return $this->db->connect()->query($sql)->fetch_all (MYSQLI_ASSOC);
    }

    public function getPengembalian () {
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NOT NULL";

        return $this->db->connect()->query($sql)->fetch_all (MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findKembali($id){
        $sql = "SELECT buku.judul as buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is NOT NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create ($data){
        $id_user = $data['id_user'];
        $id_buku = $data['id_buku'];
        $tanggal_peminjaman = $data['tanggal_peminjaman'];
        $kondisi_buku_saat_dipinjam = $data['kondisi_buku_saat_dipinjam'];
        $sql = "INSERT INTO peminjaman (id_user,id_buku,tanggal_peminjaman,kondisi_buku_saat_dipinjam) VALUES ('$id_user','$id_buku', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";
        
        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil meminjam buku, Selamat membaca!";
        }
        return "Gagal meminjam buku, coba lagi nanti!";
    }

    public function update ($id, $data){
        $id_user = $data['id_user'];
        $id_buku = $data['id_buku'];
        $tanggal_peminjaman = $data['tanggal_peminjaman'];
        $tanggal_pengembalian = $data['tanggal_pengembalian'];
        $kondisi_buku_saat_dipinjam = $data['kondisi_buku_saat_dipinjam'];
        $kondisi_buku_saat_dikembalikan = $data['kondisi_buku_saat_dikembalikan'];
        $sql = "UPDATE peminjaman SET id_user='$id_user' , id_buku ='$id_buku', tanggal_peminjaman = '$tanggal_peminjaman', tanggal_pengembalian = '$tanggal_pengembalian', kondisi_buku_saat_dipinjam= '$kondisi_buku_saat_dipinjam', kondisi_buku_saat_dikembalikan = '$kondisi_buku_saat_dikembalikan' WHERE id ='$id'";
       
        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENGUPDATE DATA";
        }
        return "DATA GAGAL DI UPDATE"; 
    }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE peminjaman SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            echo "BERHASIL MENGHAPUS DATA";
        } else {
            echo "DATA GAGAL DI HAPUS"; 
        }
    }

    public function __destruct (){
        
    }
}

?>
