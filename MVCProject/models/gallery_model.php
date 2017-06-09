<?php

class Gallery_Model extends Model {
    //Gallery model constructor
    public function __construct() {
        parent::__construct();
    }

    // This function takes data of pictures from external API and returns the data that the user ask as JSON, and then this data will shown in the UI
    public function run() {
        if (isset($_GET['category'])) {
            $userCategory = $_GET['category'];
            $url = "https://pixabay.com/api/?key=5523270-b155c70c398287d555674f79a&q=$userCategory";
            try {
                $result = @file_get_contents($url, 0);
                if ($result === FALSE)
                    die("Error");
            } catch (Exception $ex) {
                echo $e->getMessage();
            }
            $parsed_json = json_decode($result);
            $json = [
                "images" => array(),
            ];
            for ($i = 0; $i < 20; $i++) {
                $images = $parsed_json->{'hits'}[$i]->{'webformatURL'};
                $tags = $parsed_json->{'hits'}[$i]->{'tags'};
                $json["images"][$i] = [
                    "image" => $images,
                    "tag" => $tags
                ];
            }
            echo json_encode($json);
        }
    }

}
