<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if ($this->db->checkExist($_POST['username'], $_POST['password'])) {
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        }
        $this->error("Wrong username or password.");
    }

    public function error($msg) {
        require 'controllers/error.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

}
