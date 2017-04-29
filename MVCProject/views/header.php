<!DOCTYPE html>
<html>
    <head>
    <center>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css" />
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
        <h1><font color="purple">Welcome to team H project!</font></h1>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
    </head>
    <body>

        <?php Session::init(); ?>

        <div id="header">
            <b><FONT SIZE=4>Menu:</b>
            <br />
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard">Dashboard</a>	
            <?php endif; ?>
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard/logout">Logout</a>	
            <?php else: ?>
                <a href="<?php echo URL; ?>register">Register</a>
                <a href="<?php echo URL; ?>login">Login</a>

            <?php endif; ?>
            <hr size=20 color="grey">

        </div>

        <div id="content">
            <!--</FONT>-->

