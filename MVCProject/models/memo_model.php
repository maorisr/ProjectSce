<?php

class Memo_Model extends Model {

    //memo model constructor , construct the model and uses the data base
    //session init so we could use the username
    public function __construct() {
        parent::__construct();
        Session::init();
    }

    //add a memo function ,sends to create rows in the data base , and return a json object describing the status of the upload
    public function add() {

        if (isset($_GET['text'])) {
            if ($this->db->createRowsInMemo()) {//if succeded 
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "color" => "#" . $_GET['color']
                ];
            } else {//if not successful
                $json = [
                    "upload" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else {
            $json = [//if there isnt any text
                "upload" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json); //sends back
    }

    public function deleteMemo() {//sends to data base to delete the specific memo
        if (isset($_GET['user'])and isset($_GET['text'])and isset($_GET['color'])) {
            $this->db->deleteRowsFromMemo();
            $json = [
                "delete" => "successful",
                "user" => Session::get('username')
            ];
            echo json_encode($json); //sends back
        }
    }
//get all useres memo function, read from data base with the specific username
    public function getUserMemo() {
        if (Session::get("loggedIn")) {
            $data = $this->db->readRowsFromMemo();
            $json = array();//json array
            $x = 0;
            foreach ($data as $row) {//json array build
                $json[$x] = [
                    "user" => $row[0],
                    "text" => $row[1],
                    "color" => $row[2]
                ];
                $x = $x + 1;
            }
            echo json_encode($json);//sends back to js
        }
    }

    public function error($msg) {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

}
