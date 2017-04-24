<?php

class Database {

    public $connection;

    public function __construct() {
        //parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS); 
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    function createRows() {
        global $connection;

        $username = $_POST['username'];
        if (strlen($username) == 0) {
            $this->error("Username cannot be empty.");
            return false;
        }
        $password = $_POST['password'];
        if (strlen($password) < 6) {
            $this->error("Password needs to be at least 6 characters long.");
            return false;
        }
        $query = "INSERT INTO users(username,password)";
        $query .= "VALUES('$username','$password')";
        $result = mysqli_query($this->connection, $query);
        echo "here";
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        } else {
            echo"Registration successful";
        }

        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("mysqli_error");
        }
        return true;
    }

    function readRows() {
        //global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
//        while ($row = mysqli_fetch_assoc($result)) {
//            print_r($row);
//        }
        return $result;
    }

    function showAllData() {
        //global $connection;
        $query = "SELECT * FROM users";

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            echo "<option value='$id'>$id</option>";
        }
    }

    function UpdateTable() {
        if (isset($_POST['submit'])) {
            //global $connection;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password' ";
            $query .= "WHERE id = $id ";
            $result = mysqli_query($this->connection, $query);
            if (!$result) {
                die("QUERY FAIELD" . mysqli_error($this->connection));
            } else {
                echo"Settings successful";
            }
        }
    }

    function deleteRows() {
        if (isset($_POST['submit'])) {
            global $connection;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $query = "DELETE FROM users ";
            $query .= "WHERE id = $id ";
            $result = mysqli_query($this->connection, $query);
            if (!$result) {
                die("QUERY FAIELD" . mysqli_error($this->connection));
            } else {
                echo"Deleting successful";
            }
        }
    }

    function error($msg) {
        require 'controllers/error.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

    function checkExist($user, $password) {
        $rows = $this->readRows();
        while ($row = mysqli_fetch_assoc($rows)) {
            if ($row['username'] == $user && $row['password'] == $password) {
                return true;
            }
        }
        return false;
    }

}
