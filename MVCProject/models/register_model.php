<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if($this->db->createRows())
            header('location: ../login');
        
        //header('location: ../register');
        //
        //$data = $sth->fetchAll();

//        $count = $sth->rowCount();
//        if ($count > 0) {
//            // login
//            Session::init();
//            Session::set('loggedIn', true);
//            header('location: ../dashboard');
//        } else {
//            header('location: ../login');
//        }
    }

}
