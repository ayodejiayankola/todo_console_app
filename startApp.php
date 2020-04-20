<?php
require_once 'Menu.php';

//Created a new instance of the menu
$newApp = new Menu();

//Run the menu loop to start the print menu functions
while(true){

    $newApp->printMenu($input);

    if($input === 9){
        $this->quit;
    }

}