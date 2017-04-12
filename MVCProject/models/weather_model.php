<?php

class Weather_Model extends Model {

    private $user_city = null;
    private $user_country = null;

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        if (isset($_GET)) {
            $this->user_city = $_GET['city'];
            $this->user_country = $_GET['country'];

            $api_url = "http://api.openweathermap.org/data/2.5/find?q=Palo+Alto&units=imperial&type=accurate&mode=xml&APPID=671d9aea9495ba900875eb42b4d2a338" . $user_city . "," . $user_country;

            //$weather_data = file_get_contents($api_url);
            //$getweather = simplexml_load_file($api_url);
            //$gethumidity = $getweather->list->item->humidity['value'];
            //$gettemp = $getweather->list->item->temperature['value'];

            function file_get_contents_curl($api_url) {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $api_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
                curl_setopt($curl, CURLOPT_ENCODING, "");
                $data = curl_exec($curl);
                curl_close($curl);
                return $data;
            }

            $weather_data = file_get_contents_curl('myUrl/json/file.json?jsonp=');

            $json = json_decode($weather_data, TRUE);


            $user_temp = $json['main']['temp'];
            $user_humidity = $json['main']['humidity'];
            $user_conditions = $json['weather'][0]['main'];
            $user_wind = $json['wind']['speed'];
            $user_wind_direction = $json['wind']['deg'];

            echo($user_conditions);


            echo "<strong> City: </strong>" . $this->user_city . "<br />";
            echo "<strong> Country: </strong>" . $this->user_country . "<br />";
            echo "<strong> Humidity: </strong>" . $user_humidity . "<br />";
            echo "<strong> Current Conditions: </strong>" . $user_conditions . "<br />";
            echo "<strong> Wind Speed: </strong>" . $user_wind . "<br />";
            echo "<strong> Wind Direction: </strong>" . $user_wind_direction . "<br />";
            echo "<strong> Current Temperature: </strong>" . $user_temp . "<br />";
        };
    }

}
