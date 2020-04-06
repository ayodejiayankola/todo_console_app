<?php

require_once 'helper.php';

class Todo
{
	private $myFile;
	
	public $id;
	public $name;
	public $list;
	
	
	public function __construct()
	{
		// opened the file connection$this
		$this->myFile = fopen("db.json", "a+") or die("Unable to open db!");
		
	}
	
	
	// Add a new List within a Todo List
	public function createTodo($name, $list = [])
	{
		// generate id
		$this->id = generateRandomString(10);
		
		$this->name = $name;
		$this->list = $list;
		
		// serialise = changing obj to string
		$json_str = serialize($this);
		
		// write to file
		return file_put_contents("db.json", $json_str . "\n", FILE_APPEND | LOCK_EX);
	}
	
	public function getATodo($id)
	{
		// loop through all file rows, convert back to object, check if u have what u are looking for
		while ($data = fgets($this->myFile)) {
			$data_obj = unserialize($data);
			if ($data_obj->id === $id) {
				return $data_obj;
			}
		}
	}
	
	public function getAllTodo()
	{
		$all_todo = [];
		while ($data = fgets($this->myFile)) {
			$data_obj = unserialize($data);
		}
		
		return $all_todo;
	}
	
	public function updateTodoName($id, $name)
	{
		$todo = $this->getATodo($id);
		$todo->name = $name;
		
		$this->deleteTodo($id);
		
		$json_str = serialize($todo);
		return file_put_contents("db.json", $json_str . "\n", FILE_APPEND | LOCK_EX);
		
		
	}
	
	public function updateTodoList($id, $list)
	{
		$todo = $this->getATodo($id);
		$todo->list = $list;
		
		$this->deleteTodo($id);
		
		$json_str = serialize($todo);
		return file_put_contents("db.json", $json_str . "\n", FILE_APPEND | LOCK_EX);
	}
	
	
	public function deleteTodoListItem($todoId, $index)
	{
		$todo = $this->getATodo($todoId);
		
		$list = $todo->list;
		unset($list[$index]);
		$this->updateTodoList($todoId, $list);
	}
	
	public function deleteTodo($id)
	{
		
		$todos = [];
		while ($json_str = fgets($this->myFile)) {
			$data_obj = unserialize($json_str);
			if ($data_obj->id !== $id) {
				$todos[] = $data_obj;
			}
		}
		$this->deleteAllTodo();
		
		foreach ($todos as $todo) {
			$json_str = serialize($todo);
			file_put_contents("db.json", $json_str, FILE_APPEND | LOCK_EX);
		}
		
	}
	
	public function deleteAllTodo()
	{
		file_put_contents("db.json", "");
	}
	
	
    public function quit(){
        exit();
    }

/*public function showMenu($userInput){

		echo(@" Welcome to the Console Formular App
		1 -  create a New todo list
		2 - Show all to do list
		3 - Show Item in a list
		4 - Edit List Name 
		5 - Remove a list 
		6 - Remove an item in the list
		7 - Pin a list
		8 - Quit!");
	
	$userInput = intval(trim( fgets(STDIN) ));
	switch ($userInput)
	{
		case 1:
			$this->createTodo();
			break;
		case 2:
			$this->getAllTodo();
			break;
		case 3:
			$this->getATodo();
			break;
		case 4:
			$this->updateTodoName();
			break;
		case 5:
			$this->updateTodoList();
			break;
		case 6:
			$this->deleteTodoListItem();
			break;
		case 7:
			$this->deleteTodo();
			break;
		case 8:
			$this->quit();
		break;
		default:
			echo ("Input not understood, Please retry again...");
			break;
		}	
	}


*///$myTodo = new Todo;

//$myTodo->showMenu($userInput);


	} 