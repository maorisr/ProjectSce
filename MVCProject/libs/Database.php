<?php

class Database {

    public $connection;

    public function __construct() {
        //parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS); 
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        Session::init();
    }

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

    function selectFromTodo() {
        $user = SESSION::get('username');
        //WEHRE user = '$user'";
        $query = "SELECT * FROM todo WHERE `user`='$user'";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        }
        return mysqli_fetch_all($result);
    }

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

    function uploadPhoto() {
        $imagename = $_FILES["myimage"]["name"];
        //Get the content of the image and then add slashes to it 
        $imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
        //Insert the image name and image content in image_table
        $insert_image = "INSERT INTO image_table VALUES('$imagetmp','$imagename')";
        mysql_query($insert_image);
    }

    function error($msg) {
        require 'controllers/ErrorClass.php';
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
//        str_replace(":user",SESSION::get('username'),$query);
//        str_replace(":text",$text,$query);

        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Query FAIELD" . mysqli_error());
        } else {
            return true;
            ;
        }
    }

}
