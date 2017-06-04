<?php
class Today_Model extends Model /**extends Model**/
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = null;
    }

    public function run()
    {
        $url = "http://history.muffinlabs.com/date";
        $result = file_get_contents($url);
        $parsed_json = json_decode($result);
        $date = $parsed_json->{'date'};
        $link = $parsed_json->{'url'};
        $i = rand(0, 20);
        $year = $parsed_json->{'data'}->{'Events'}[$i]->{'year'};
        $text = $parsed_json->{'data'}->{'Events'}[$i]->{'html'};
        $json = [
            "link" => $link,
            "date" => $date,
            "year" => $year,
            "text" => $text,
        ];
        echo json_encode($json);
    }
}


