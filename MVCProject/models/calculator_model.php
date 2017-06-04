<?php

class Calculator_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if (isset($_GET['toCalc'])) {
            $toCalc = $_GET['toCalc'];
//            $mathString = trim($toCalc);     // trim white spaces
//            $mathString = preg_replace('[^0-9\+-\*\/\(\) ]', '', $toCalc);    // remove any non-numbers chars; exception for math operators
//            $compute = create_function("", "return (" . $toCalc . ");");
//            $result = 0 + $compute();
//            require_once "eos.class.php";
//            $result = $eq->solveIF($toCalc);
            $result = eval('return ' .$toCalc . ';');
            $json = [
                "newValue" => $result
            ];
            echo json_encode($json);
        }
    }

}
?>


