<?php

class Dashboard extends Controller {

// Controller dashboard constructor

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit;
        }
        $this->view->js = array('dashboard/js/default.js');
    }

//The page that shown to the user
    function index() {
        $this->view->render('dashboard/index');
    }

// Log out the user
    function logout() {
        Session::destroy();
        header('location: ../login');
        exit;
    }

    function xhrInsert() {
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

}
