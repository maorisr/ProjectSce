<?php

class Todo_Model extends Model {
    /* An array that stores the todo item data: */

    public function __construct() {
        parent::__construct();
        Session::init();
    }

    public function done() {
        if ((isset($_GET['text'])) and ( isset($_GET['done']))) {
            if ($this->db->UpdateTodo()) {
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "done" => 'false'
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

    public function addTODO() {

        if (isset($_GET['text'])) {
            if ($this->db->createRowsInTodo()) {
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "done" => 'false'
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

    public function deleteTODO() {
        if (isset($_GET['text'])) {
            if ($this->db->deleteRowsFromTodo()) {
                $json = [
                    "delete" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            } else {
                $json = [
                    "delete" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else {
            $json = [
                "delete" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json);
    }

    public function read() {
        $data = $this->db->selectFromTodo();
        $json = array();
        $x = 0;
        foreach ($data as $row) {
            $json[$x] = [
                "user" => $row[0],
                "text" => $row[1],
                "done" => $row[2]
            ];
            $x = $x + 1;
        }
        echo json_encode($json);
    }

}
