<?php

class todo extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('todo/todoview.js');
    }

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
