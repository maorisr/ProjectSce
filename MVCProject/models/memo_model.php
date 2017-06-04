<?php

class Memo_Model extends Model {

    public function __construct() {
        parent::__construct();
        Session::init();
    }

    public function add() {

        if (isset($_GET['text'])) {
            if ($this->db->createRowsInMemo()) {
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "color" => "#" . $_GET['color']
                ];
            } else {
                $json = [
                    "upload" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else {
            $json = [
                "upload" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json);
    }

    public function deleteMemo() {
        if (isset($_GET['user'])and isset($_GET['text'])and isset($_GET['color'])) {
           $this->db->deleteRowsFromMemo();
        }
    }

    public function getUserMemo() {
        if (Session::get("loggedIn")) {
            $data = $this->db->readRowsFromMemo();
            $json = array();
            $x=0;
            foreach ($data as $row) {
                $json[$x] = [
                    "user" => $row[0],
                    "text" => $row[1],
                    "color" => $row[2]
                ];
                $x=$x+1;
            }
            echo json_encode($json);
        }
    }

    public function error($msg) {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

}
