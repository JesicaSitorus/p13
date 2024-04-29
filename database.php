<?php

class Database {
 
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "malasngoding";
    private $conn;
 
    function __construct(){
        $this->conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
 
    function tampil_data(){
        $sql = "SELECT * FROM user";
        $result = $this->conn->query($sql);
        $hasil = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function input($nama, $alamat, $usia){
        $sql = "INSERT INTO user (nama, alamat, usia) VALUES ('$nama', '$alamat', '$usia')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    function __destruct(){
        $this->conn->close();
    }

    function hapus($id){
        $sql = "DELETE FROM user WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    function edit($id){
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = $this->conn->query($sql);
        $hasil = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function update($id, $nama, $alamat, $usia){
        $sql = "UPDATE user SET nama='$nama', alamat='$alamat', usia='$usia' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
 
} 
 
?>
