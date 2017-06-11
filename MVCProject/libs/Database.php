<?php

class Database {

 // In that class will be All the functions associated with the Database.
 // For ex.: adding an user to the database, check if user exists, add memo or TODO list to the data base and more.
   
    
    
    public $connection;

    public function __construct() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        Session::init();
    }

    // Adding an user to the database with input valid check
    function createRows() {
        global $connection;
        $username = $_POST['username'];

        $result = $this->connection->query("SELECT * FROM users WHERE username = '$username'");
        if ($result->num_rows > 0) {
            $this->error("Username already exists.");
            return false;
        }

        if (strlen($username) <= 0) {
            $this->error("Username needs to be at least 6 characters long.");
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

   // Read a data from the DB
    function readRows() {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
        return $result;
    }


    // Show the data
    function showAllData() {
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
    
    // Update the DB table TODO
    function UpdateTodo(){
        global $connection;
        $text = $_GET['text'];
        $done= $_GET['done'];
        $user = SESSION::get('username');
        
        $query = "UPDATE todo SET done='$done' WHERE (user='$user' AND text='$text')";

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        } else {
            return true;
        }
    }
    
    // Update the table
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
    // Delete rows for the table in the DB
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

    // Select an TODO row from the table
    function selectFromTodo() {
        $user = SESSION::get('username');
        $query = "SELECT * FROM todo WHERE `user`='$user'";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
        return mysqli_fetch_all($result);
    }

    // Adding a TODO
    function createRowsInTodo() {
        global $connection;
        $text = $_GET['text'];

        if (strlen($text) <= 0) {
            $this->error("text cannot be empty");
            return false;
        }
        $user = SESSION::get('username');
        $query = "INSERT INTO todo VALUES ('$user','$text',0)";


        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        } else {
            return true;
        }
    }

    // Delete a todo from the DB table
    function deleteRowsFromTodo() {
        if (isset($_GET['text'])) {
            global $connection;
            $text = $_GET['text'];
            $user = SESSION::get('username');
            $query = "DELETE FROM todo ";
            $query .= "WHERE (user = '$user' AND text='$text')";
            $result = mysqli_query($this->connection, $query);
            if (!$result) {
                die("QUERY FAIELD" . mysqli_error($this->connection));
            } else {
                return true;
            }
        }
    }

    // Not in use
    function uploadPhoto() {
        $imagename = $_FILES["myimage"]["name"];
        $imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
        $insert_image = "INSERT INTO image_table VALUES('$imagetmp','$imagename')";
        mysql_query($insert_image);
    }

    // Showing an error if happend
    function error($msg) {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }
    // Checking if the user exists
    function checkExist($user, $password) {
        $rows = $this->readRows();
        while ($row = mysqli_fetch_assoc($rows)) {
            if ($row['username'] == $user && $row['password'] == $password) {
                return true;
            }
        }
        return false;
    }
    // Delete a memo from the DB table
 function deleteRowsFromMemo() {
        if (isset($_GET['user'])and isset($_GET['text'])and isset($_GET['color'])) {
            global $connection;
            $text = $_GET['text'];
            $user = $_GET['user'];
            $color="#".$_GET['color'];
            $query = "DELETE FROM memo WHERE (`username`='$user' AND `text`='$text' AND `color`='$color')";
            $result = mysqli_query($this->connection, $query);
            if (!$result) {
                die("QUERY FAIELD " . mysqli_error($this->connection));
            } else {
                echo "true";
            }
        }
    }
    // Read an memo from the DB table
  function readRowsFromMemo() {
        //global $connection;
        $user=SESSION::get('username');
        $query = "SELECT * FROM `memo` WHERE `username`='$user'";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
        return mysqli_fetch_all($result);
    }
    // adding new memo to the DB
    function createRowsInMemo() {
        global $connection;
        $text = $_GET['text'];
        $color = '#' . $_GET['color'];
        if (strlen($text) <= 0) {
            $this->error("text cannot be empty");
            return false;
        }
        $user = SESSION::get('username');
        $query = "INSERT INTO `memo`(`username`, `text`, `color`) VALUES ('$user','$text','$color')";

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        } else {
            return true;
            ;
        }
    }

}
