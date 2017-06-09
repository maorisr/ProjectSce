<?php

class View {
    
    // This class responsible about the view of the user.
    function __construct() {
    }

    public function render($name, $noInclude = false) {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.html';
            require 'views/footer.php';
        }
    }

}
