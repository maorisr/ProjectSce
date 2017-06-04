<?php

/**
 * Created by PhpStorm.
 * User: Yotam
 * Date: 07/05/2017
 * Time: 10:01
 */
class Today extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->js = array('today/view.js');
    }

    function index() {
        $this->view->render('today/index');
    }

    function run() {
        $this->view->data = $this->model->run();
    }
}