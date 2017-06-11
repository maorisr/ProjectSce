<?php
// This class controls the transition between the GUI and the logic
class todo extends Controller {
    // todo controller constructor, Session::init- let us use the user name, constructing the controlller with the view.*
    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('todo/todoview.js');// set the js to be todoview.js
    }

    //The first page of the widget that shown to the user
    function index() {
        $this->view->render('todo/index');
    }
    // Activates the function "addTODO" in class "Todo_Model"
    function addTODO() {
        $this->model->addTODO();
    }
    // Activates the function "done" in class "Todo_Model"
    function done() {
        $this->model->done();
    }
    // Activates the function "deleteTODO" in class "Todo_Model"
    function deleteTODO() {
        $this->model->deleteTODO();
    }
    // Activates the function "read" in class "Todo_Model"
    function read() {
        $this->model->read();
    }

}
