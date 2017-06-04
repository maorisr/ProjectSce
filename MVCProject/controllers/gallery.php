<?php

class Gallery extends Controller {

    function __construct() {
        parent::__construct();
        session::init();
        $this->view->js = array('gallery/view.js');
    }

    function index() {
        $this->view->render('gallery/index');
    }

    function run() {
        $this->view->data = $this->model->run();
    }

    
}
