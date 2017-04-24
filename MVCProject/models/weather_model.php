<?php

class Weather_Model extends Model {

    private $user_city = null;
    private $user_country = null;
    private $weather = null;

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        if (isset($_GET['city'])) {
            $userCity = $_GET['city'];
            $key = "a34d62f69a874265a1792200171204";
            $url = "http://api.apixu.com/v1/current.json?key=$key&q=$userCity&=";
            $result = file_get_contents($url,0);
            $parsed_json = json_decode($result);
            $region = $parsed_json->{'location'}->{'region'};
            $country = $parsed_json->{'location'}->{'country'};
            $temperature = $parsed_json->{'current'}->{'temp_c'};
            $feelsLike = $parsed_json->{'current'}->{'feelslike_c'};
            $conditionImage = $parsed_json->{'current'}->{'condition'}->{'icon'};
            $conditionText = $parsed_json->{'current'}->{'condition'}->{'text'};
            $windMph = $parsed_json->{'current'}->{'wind_mph'};
            $windKph = $parsed_json->{'current'}->{'wind_kph'};
            $windDegree = $parsed_json->{'current'}->{'wind_degree'};
            $updatedOn = $parsed_json->{'current'}->{'last_updated'};       
            $json = [
                "city" => $userCity,
                "region" => $region,
                "country" => $country,
                "temperature" => $temperature,
                "feelsLike" => $feelsLike,
                "conditionImage" => $conditionImage,
                "conditionText" => $conditionText,
                "windMph" => $windMph,
                "windKph" => $windKph,
                "windDegree" => $windDegree,
                "updatedOn" => $updatedOn
            ];     
            echo json_encode($json);
            }
    }

}
