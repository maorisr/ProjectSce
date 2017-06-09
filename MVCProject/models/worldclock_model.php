<?php
class WorldClock_Model extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if (isset($_GET['timezone'])) {
            //create an associative array of variables passed to the current script via the URL parameters
            $userTimeZone = $_GET['timezone'];
            //the url with the key
            $url = "http://api.timezonedb.com/v2/get-time-zone?key=U69GPDO5H1TQ&format=json&by=zone&zone=$userTimeZone";
            try{
                //returns the file in a string and if failed return false
                $result = @file_get_contents($url,0);
                if($result === FALSE)
                    die("Error");
            } catch (Exception $ex) {

            }
            //Takes a JSON encoded string and converts it into a php variable.
            $parsed_json = json_decode($result);
            $country =  $parsed_json->{'countryName'};
            $zone = $parsed_json->{'zoneName'};
            $time = $parsed_json->{'formatted'};
            $json = [
                "country" => $country,
                "zone" => $zone,
                "time" => $time,
            ];
            echo json_encode($json);
        }
    }

}