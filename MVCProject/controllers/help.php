<?php

class Help extends Controller {
    // Controller constructor
    function __construct() {
        parent::__construct();
        session::init();
    }
    //The page that shown to the user

    function index() {
        $this->view->render('help/index');
    }
    // Run the model of the widget and proccecing the data for the user
    public function other($arg = false) {
        require_once 'models/help_model.php';
        $model = new Help_Model();
    }

}
