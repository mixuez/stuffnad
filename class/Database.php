<?php

class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_perpustakaan";

    public function connect (){
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}
?>