<?php

class Calculator_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
////Take the textbox value from the controller and send it back with the result
    ///Return JSON object 
    public function run() {
        if (isset($_GET['toCalc'])) {
            $toCalc = $_GET['toCalc'];
            $result = eval('return ' .$toCalc . ';');
            $json = [
                "newValue" => $result
            ];
            echo json_encode($json);
        }
    }

}
?>


