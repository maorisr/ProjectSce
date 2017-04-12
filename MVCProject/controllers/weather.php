<?php

class Weather extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('weather/index');
    }
    
    function run(){
        $this->model->run();
    }
    function answer(){
        $this->view->render('weather/answer');

    }
}
