<?php
require_once 'controller.php';

//$todo = new Todo();
//$todo->createTodo('Office Tasks', ['Write Code', 'Gist'] , 'Home Tasks', [' Code', 'Gist'] );



class View extends Todo{

    

public function showMenu($userInput){

    echo(@" Welcome to the Console Formular App
    1 -  create a New todo list
    2 - Show all to do list
    3 - Show Item in a list
    4 - Edit List Name 
    5 - Edit List Item
    6 - Remove a list 
    7 - Remove an item in the list
    8 - Delete all Todo
    9 - Quit!");

$userInput = intval(trim( fgets(STDIN) ));
switch ($userInput)
{
    case 1:
        $this->createTodo('Office Tasks', ['Write Code', 'Gist']);
        break;
    case 2:
    $this->getAllTodo();   
        break;
    case 3:
        var_dump(
        $this->getATodo('Q744JT8AOz'));
        break;
    case 4:
        $this->updateTodoName('KOBAGSXW0s',' work');
        break;
    
    case 5;
        $this->updateTodoList('SrlBpIFxWa',['Write Code', 'sleep']);
        break;
    case 6:
       $this->deleteTodo(10);
       
        break;
    
    case 7:
        $this->deleteTodoListItem();
        break;
    case 8:
        $this->deleteAllTodo();
        break;
    case 9:
        $this->quit();
    break;
    default:
        echo ("Input not understood, Please retry again...");
        break;
    }	
}


}

$view = new View;


$view->showMenu(!empty($userInput));