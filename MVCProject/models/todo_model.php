<?php

class Todo_Model extends Model {

    // todo model constructor, construct the model and uses the data base, Session::init- let us use the user name
    public function __construct() {
        parent::__construct();
        Session::init();
    }
    // update the task's state (done or not)
    public function done() {
        if ((isset($_GET['text'])) and ( isset($_GET['done']))) {
            if ($this->db->UpdateTodo()) { //if succeded
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "done" => 'false'
                ];
            } else { //not succeded
                $json = [
                    "upload" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else { //there is no text or the task not checked
            $json = [
                "upload" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json); //sends back
    }
    // add task, sends to create rows in the db, initialize it as not done, and return a json object describing the status of the upload
    public function addTODO() {

        if (isset($_GET['text'])) {
            if ($this->db->createRowsInTodo()) { //if succeded
                $json = [
                    "upload" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username'),
                    "done" => 'false'
                ];
            } else { //not succeded
                $json = [
                    "upload" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else { //there is no text
            $json = [
                "upload" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json); //sends back
    }
    // delete all information about task from the db
    public function deleteTODO() {
        if (isset($_GET['text'])) {
            if ($this->db->deleteRowsFromTodo()) { //if succeded
                $json = [
                    "delete" => "successful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            } else { //not succeded
                $json = [
                    "delete" => "unsuccessful",
                    "text" => $_GET['text'],
                    "user" => Session::get('username')
                ];
            }
        } else { //there is no text
            $json = [
                "delete" => "unsuccessful",
                "user" => Session::get('username')
            ];
        }
        echo json_encode($json); // sends back
    }
    // get all information about the user's todo list
    public function read() {
        $data = $this->db->selectFromTodo();
        $json = array();
        $x = 0;
        foreach ($data as $row) {
            $json[$x] = [  // put all information in json array
                "user" => $row[0],
                "text" => $row[1],
                "done" => $row[2]
            ];
            $x = $x + 1;
        }
        echo json_encode($json); // sends back
    }

}
