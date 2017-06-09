<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    // Creating in the database table new user
    public function run() {
        if($this->db->createRows())
            header('location: ../login');

    }

}
