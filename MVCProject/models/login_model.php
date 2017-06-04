`<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if ($this->db->checkExist(htmlentities($_POST['username']), htmlentities($_POST['password']))) {
            Session::init();
            Session::set('username',$_POST['username']);
            Session::set('loggedIn', true);
            //$this->error("post username is ".$_POST['username']."     and session username is ".Session::get('username'));
            header('location: ../dashboard');
        }
        $this->error("Wrong username or password.");
    }

    public function error($msg) {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

}