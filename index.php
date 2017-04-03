<?php
require 'IncomingRequest.php';

 $a = new IncomingRequest();
// $a->input('user')
// $a->input('user', 'default');
 
 
$myuser='nothing';

if ($a->has('user')){
    $myuser=$a->input('user');
}

 print_r($myuser);
 
 
 print_r($a->query('hello'));
?>