<?php


class ErrorClass extends Controller {
    // Controller constructor
    function __construct() {
        parent::__construct();
    }
    //The page that shown to the user

    function index($msg='This page doesnt exist') {
        $this->view->msg =$msg ;
        $this->view->render('error/index');
    }

}
