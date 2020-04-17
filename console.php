<?php


require_once('new.php');


//instaiate the new class
$view = new View;


$view->showMenu(!empty($userInput));

