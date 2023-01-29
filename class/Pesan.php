<?php
include_once ("Database.php");
    class Pesan {
        private $db;

        public function __construct (){
            $this->db = new Database;
        }

        public function all() {
            $sql = "SELECT * FROM pesan";

            return $this->db->connect()->query($sql)->fetch_all (MYSQLI_ASSOC);
        }

        // public function findByUserId($id) {
        //     $sql = "SELECT * FROM pesan WHERE id='$id'"
        // }

        public function find($id){
            $sql = "SELECT * FROM pesan WHERE id='$id'";

            return $this->db->connect()->query($sql)->fetch_assoc();
        }

        public function create ($data){
            $id_penerima = $data ['id_penerima'];
            $id_pengirim = $data ['id_pengirim'];
            $judul_pesan = $data ['judul_pesan'];
            $isi_pesan = $data ['isi_pesan'];
            $status = $data ['status'];
            $tanggal_kirim = $data ['tanggal_kirim'];
            $sql = "INSERT INTO pesan (id_penerima, id_pengirim, judul_pesan, isi_pesan, status, tanggal_kirim) VALUES ('$id_penerima', '$id_pengirim', '$judul_pesan', '$isi_pesan', '$status', '$tanggal_kirim')";

            if($this->db->connect()->query($sql) === TRUE){
                return "BERHASIL MENAMBAHKAN PESAN";
            }
            return "Gagal Menambahkan Pesan";
        }

        public function update ($id, $data){
            $id_penerima = $data ['id_penerima'];
            $id_pengirim = $data ['id_pengirim'];
            $judul_pesan = $data ['judul_pesan'];
            $isi_pesan = $data ['isi_pesan'];
            $status = $data ['status'];
            $tanggal_kirim = $data ['tanggal_kirim'];
            $sql = "UPDATE pesan SET id='$id' , id_penerima ='$id_penerima' , id_pengirim = '$id_pengirim', judul_pesan = '$judul_pesan', isi_pesan = '$isi_pesan', status='$status', tanggal_kirim = '$tanggal_kirim' WHERE id ='$id'";

            if($this->db->connect()->query($sql) === TRUE){
                return "BERHASIL MENGUPDATE DATA";
            }
            return "DATA GAGAL DI UPDATE"; 
        }

        public function delete ($id){
            $date = date('Y-m-d H:i:s');
            $sql = "UPDATE pesan SET deleted_at = '$date' WHERE id='$id'";
    
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