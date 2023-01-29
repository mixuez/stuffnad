<?php
include_once("Database.php");
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all () {
        $sql = "SELECT * FROM user";

        return $this->db->connect()->query($sql)->fetch_all ( MYSQLI_ASSOC);
    }

    public function getAnggota() {
        $sql = "SELECT * FROM user WHERE role = 'user' AND deleted_at IS NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdmin() {
        $sql = "SELECT * FROM user WHERE role = 'admin'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM user WHERE id=$id";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create ($data){
        $kode = $data['kode'];
        $nis = $data['nis'];
        $fullname = $data['fullname'];
        $username = $data['username'];
        $password = $data['password'];
        $kelas = $data['kelas'];
        $alamat = $data['alamat'];
        $verif = $data['verif'];
        $role = $data['role'];
        $join_date = $data['join_date'];
        // $terakhir_login = $data['terakhir_login'];
        $sql = "INSERT INTO user (kode,nis,fullname,username,password,kelas,alamat,verif,role,join_date) VALUES ('$kode','$nis','$fullname', '$username','$password','$kelas','$alamat','$verif','$role','$join_date')";

        if($this->db->connect()->query($sql) === TRUE){
            return "BERHASIL MENAMBAHKAN";
        }
        return "Gagal menambahkan user";
    }

    public function update($id, $data, string $option = NULL)
  {
    if ($data == NULL) {
      return exit;
    }

    $optionDefault = "id";
    if ($option !== NULL) {
      $optionDefault = $option;
    }

    $column = "";
    foreach (array_keys($data) as $name) {
      $column .= "$name = '$data[$name]',";
    }
    $column = rtrim($column, ',');

    $sql = "UPDATE user SET $column WHERE $optionDefault = '$id'";

    // echo $sql;

    if ($this->db->connect()->query($sql)) {
      return 1;
    }
  }

    public function delete ($id){
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            echo "BERHASIL MENGHAPUS DATA";
        } else {
            echo "DATA GAGAL DI HAPUS"; 
        }
    }

    public function register($data){
        $nis = $data['nis'];
        $fullname = $data['fullname'];
        $username = $data['username'];
        $password = $data['password'];
        $kelas = $data['kelas'];
        $role = $data['role'];

        $sql = "INSERT INTO user (nis,fullname,username,password,kelas,role) VALUES('$nis', '$fullname', '$username', '$password', '$kelas', '')";

        if($this->db->connect()->query($sql) === TRUE){
          return "Berhasil Registrasi, Silahkan Menunggu Konfirmasi Admin";
      }
      return "Gagal Registrasi";
    }

    public function login($data){
      $username = $data['username'];
      $password = $data['password'];
      $verif = $data['verif'];
      
      $sql = "SELECT user.username, user.password WHERE (user.verif = 'VERIFIED')";
      $data = mysql_fetch_array($sql);
      $no_rows = mysql_num_rows($sql);

      if ($no_rows == 1){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['verif'] = $data['verif'];
        return TRUE;
      }else {
        return FALSE;
      }
    }

    public function dataexist($username){
      $sql = mysql_query("SELECT * FROM user WHERE username = $username");
      echo $row = mysql_num_rows($sql);
      if($row > 0){
        
      }
    }

    public function __destruct(){

    }
}

?>