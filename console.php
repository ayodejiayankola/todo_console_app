<?php


require_once('menu.php');


//instaiate the new class
$view = new View;


$view->showMenu(!empty($userInput));

