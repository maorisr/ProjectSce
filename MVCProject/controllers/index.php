<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        session::init();
    }

    function index() {
//        echo 'INSIDE INDEX INDEX';
        $this->view->render('index/index');
    }

    function details() {
        $this->view->render('index/index');
    }

}
