<?php

class Weather_Model extends Model {

    private $user_city = null;
    private $user_country = null;
    private $weather=null;
    public function __construct() {
        parent::__construct();
    }

    public function run() {

        if (isset($_GET['city'])) {
            $user_city = $_GET['city'];
            $key = "a34d62f69a874265a1792200171204";
            $url = "http://api.apixu.com/v1/current.json?key=$key&q=$user_city&=";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json_output = curl_exec($ch);
            $this->weather = json_decode($json_output);
            return $this->weather;
        }
    }

}
