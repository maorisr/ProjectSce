<?php
class IncomingRequest {
    protected $query;
    protected $content;
    
    function __construct() {
        if (isset($SERVER['REQUEST_URI']))
            $this->query=$SERVER['REQUEST_URI'];//$SERVER_REQUEST URI
        else
            $this->query=NULL;
        $this->content= json_decode(file_get_contents("php://input"),TRUE);

    }
    
    public function input($key, $default = NULL) {
        if(isset($this->content[$key]))
            return $this->content[$key];
        return $default;
    }
    public function has($key){
        return isset($this->content[$key]);
        
    }
    public function query($key){
        return $this->query['$key'];
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

