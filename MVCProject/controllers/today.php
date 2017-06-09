<?php

class Today extends Controller {

    // Controller constructor
    function __construct() {
        parent::__construct();
        $this->view->js = array('today/view.js');
    }

    //The page that shown to the user

    function index() {
        $this->view->render('today/index');
    }
    // Run the model of the widget and proccecing the data for the user

    function run() {
        $this->view->data = $this->model->run();
    }

}
