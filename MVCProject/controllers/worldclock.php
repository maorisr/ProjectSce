<?php
class WorldClock extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('worldclock/view.js');
    }

    function index() {
        $this->view->render('worldclock/index');
    }

    function run() {
        $this->view->data=$this->model->run();
    }

}
