<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        session::init();
    }
    //The page that shown to the user

    function index() {
        $this->view->render('index/index');
    }
    // Run the model of the widget and proccecing the data for the user
    function details() {
        $this->view->render('index/index');
    }

}
