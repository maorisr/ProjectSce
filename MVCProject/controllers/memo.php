<?php

class Memo extends Controller {
    //memo controller constructor , session::init , so we could use the user name, constructing the controlller with the view.
    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('memo/memoview.js');// set the js to be memoview.js
    }
//first page you see when you open memo
    function index() {
        $this->view->render('memo/index');
    }
//function add,sends to model
    function add() {
        $this->view->data = $this->model->add();
    }
//render the memo showing option
    function show() {
        $this->view->render('memo/showmemo');
    }
//delete a memo function, sends to model
    function deleteMemo() {
        $this->model->deleteMemo();
    }
//get all users memo (from model)
    function getUserMemo() {
        $this->view->data = $this->model->getUserMemo();
    }

}
