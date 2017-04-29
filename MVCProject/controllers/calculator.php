<?php

class calculator extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('calculator/index');
    }
    
    function get(){
        $this->model->get();
    }
}
