<!DOCTYPE html>
<html>
    <head>
    <center>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css" />
        <div id="header">
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard"><img src="public/images/LOGO.png" alt="logo"></a>
            <?php else: ?>
                <a href="<?php echo URL; ?>index"><img src="public/images/LOGO.png" alt="logo"></a>
            <?php endif; ?>



            <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
            <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
            <?php
            if (isset($this->js)) {
                foreach ($this->js as $js) {
                    echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
                }
            }
            ?>

            <br/>
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard">Dashboard</a>
            <?php endif; ?>
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">About</a>
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard/logout">Logout</a>	
            <?php else: ?>
                <a href="<?php echo URL; ?>register">Register</a>
                <a href="<?php echo URL; ?>login">Login</a>

            <?php endif; ?>
        </div>
    </center>
    <div id="content">
    </head>

    <body>
        <?php Session::init(); ?>

