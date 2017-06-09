`<?php
// Login model
class Login_Model extends Model {
// Constructor
    public function __construct() {
        parent::__construct();
    }

    // This function check with the database if the user exists
    public function run() {
        if ($this->db->checkExist(htmlentities($_POST['username']), htmlentities($_POST['password']))) {
            Session::init();
            Session::set('username',$_POST['username']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        }
        $this->error("Wrong username or password.");
    }

    // If the login faild, shows a error.
    public function error($msg) {
        require 'controllers/ErrorClass.php';
        $controller = new ErrorClass();
        $controller->index($msg);
        return false;
    }

}