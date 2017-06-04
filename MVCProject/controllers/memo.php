<?php

class Memo extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('memo/memoview.js');
    }

    function index() {
        $this->view->render('memo/index');
    }

    function add() {
        $this->view->data = $this->model->add();
    }

    function show() {
        $this->view->render('memo/showmemo');
    }

    function deleteMemo() {
        $this->model->deleteMemo();
    }

    function getUserMemo() {
        $this->view->data = $this->model->getUserMemo();
    }

}
