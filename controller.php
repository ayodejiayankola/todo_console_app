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
		
		// changing obj to json format
		$json_str = json_encode($this);
		
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
			$all_todo[] = var_dump($data_obj);
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
	public function pinList($id)
	{
		
	}
	
	
    public function quit(){
		exit('Todo List closed');
		fclose	($this->myFile);
    }



	} 