<?php

class Login extends Controller {
    // Controller constructor
    function __construct() {
        parent::__construct();
    }
    //The page that shown to the user

    function index() {
        $this->view->render('login/index');
    }
    // Run the model of the widget and proccecing the data for the user
    function run() {
        $this->model->run();
    }

}
