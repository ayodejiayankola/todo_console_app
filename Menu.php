<?php

function printMenu(){
    echo "********** ToDo Console App
        *******************\n";
    echo "1 - create a New todo list\n";
    echo "2 - Show all to do list\n";
    echo "3 - Show Item in a list\n";
    echo "4 - Edit List Name\n";
    echo "5 - Edit List Item\n";
    echo "6 - Remove a list\n";
    echo "7 - Remove an item in the list\n";
    echo "8 - Delete all Todo\n";
    echo "9 - Quit!\n";
}
while (true){
    //print the menu on console
    printMenu();

    //Read User input
    $input = trim(fgets(STDIN));

    //Exit application
    if ($input==9){
        break;
    }

    // Act based on user's  input
    switch ($input){
        case 1:
            $this->createTodo('Office Tasks', ['Write Code', 'Gist']);

            break;
        case 2:
            $this->getAllTodo();

            break;
        case 3:

            $this->getATodo('Q744JT8AOz');
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
            echo ("Input not understood, Please provide a valid input...");
            break;
    }

}

