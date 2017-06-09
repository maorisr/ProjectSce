<?php
class WorldClock extends Controller {

    function __construct() {
        //controller constructor 
        parent::__construct();
        //Create an array that holds the information.
        $this->view->js = array('worldclock/view.js');
    }

    function index() {
        //Renders all preceding drawing commands
        $this->view->render('worldclock/index');
    }

    function run() {
        //Create the path which is the function we want to run
        $this->view->data=$this->model->run();
    }

}
