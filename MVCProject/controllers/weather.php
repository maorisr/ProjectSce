<?php

class Weather extends Controller {

    function __construct() {
        parent::__construct();
        session::init();
        $this->view->js = array('weather/view.js');
    }

    function index() {
        $this->view->render('weather/index');
    }

    function run() {
        $this->view->data=$this->model->run();
        //$this->view->render('weather/view');
    }

}
