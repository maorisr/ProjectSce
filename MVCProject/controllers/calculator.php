<?php

class Calculator extends Controller {

    function __construct() {
        parent::__construct();
        session::init();
        $this->view->js = array('calculator/view.js');
    }

    function index() {
        $this->view->render('calculator/index');
    }

    function run() {
        $this->view->data = $this->model->run();
    }

}
