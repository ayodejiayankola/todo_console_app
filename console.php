<?php


require_once('menu.php');


//instaiate the new class
$view = new Menu();


$view->startMenu(!empty($userInput));