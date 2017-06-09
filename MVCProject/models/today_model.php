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
        $url = "http://history.muffinlabs.com/date";//the today api which get and sorts the information from wikipedia
        $result = file_get_contents($url);//gets the file content
        $parsed_json = json_decode($result);//pars it into json
        //sorts all the data into local variables
        $date = $parsed_json->{'date'};
        $link = $parsed_json->{'url'};
        $i = rand(0, 20);//takes a random event out of 20
        $year = $parsed_json->{'data'}->{'Events'}[$i]->{'year'};
        $text = $parsed_json->{'data'}->{'Events'}[$i]->{'html'};
        $json = [
            "link" => $link,
            "date" => $date,
            "year" => $year,
            "text" => $text,
        ];
        echo json_encode($json);//echos the json
    }
}


