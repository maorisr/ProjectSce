<?php

class Gallery extends Controller {

    // Controller constructor
    function __construct() {
        parent::__construct();
        session::init();
        $this->view->js = array('gallery/view.js');
    }

    //The page that shown to the user
    function index() {
        $this->view->render('gallery/index');
    }
    
    // Run the model of the widget and proccecing the data for the user
    function run() {
        $this->view->data = $this->model->run();
    }

}
