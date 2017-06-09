<?php

class Register extends Controller{
    // Controller constructor
    function __construct() {
        parent::__construct();
        session::init();
    }
    //The page that shown to the user

    function index() {
        $this->view->render('register/index');
    }
    // Run the model of the widget and proccecing the data for the user

    function run() {
        $this->model->run();
    }

}
