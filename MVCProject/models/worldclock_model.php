<?php
class WorldClock_Model extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if (isset($_GET['timezone'])) {
            $userTimeZone = $_GET['timezone'];

            $url = "http://api.timezonedb.com/v2/get-time-zone?key=U69GPDO5H1TQ&format=json&by=zone&zone=$userTimeZone";
            try{
                $result = @file_get_contents($url,0);
                if($result === FALSE)
                    die("Error");
            } catch (Exception $ex) {
                echo $e->getMessage();
            }
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