<?php

class Weather extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('weather/index');
    }
    
    function get(){
        $this->model->get();
    }
}
