<?php

class Dashboard_Model extends Model {

    function __construct()
    {
        parent::__construct();
        //echo 'Dashboard model';
    }

//    function xhrInsert() 
//    {
//       $text = $_POST['text'];
//       $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
//       $sth->execute(array(':text' => $text));
//       
//    }
//    function xhrGetListings()
//    {
//        $sth = $this->db->prepare('SELECT * FROM data');
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//        $sth->execute();
//        $data= $sth->fetchAll();
//        return json_encode($data);
//    }
}
