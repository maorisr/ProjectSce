<?php

class todo extends Controller {
    // Controller constructor    
    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('todo/todoview.js');
    }
    //The page that shown to the user

    function index() {
        $this->view->render('todo/index');
    }

    function addTODO() {
        $this->model->addTODO();
    }

    function done() {
        $this->model->done();
    }

    function deleteTODO() {
        $this->model->deleteTODO();
    }
    function read() {
        $this->model->read();
    }

}
