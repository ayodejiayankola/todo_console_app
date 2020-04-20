    <?php
    class Controller
    {
        private $toDoFileArray =[];
        public $id;
        public $name;
        public $list=[];

        public function __construct($id,$name, $list=[])
        {
           $this->id =$id;
           $this->name =$name;
           $this->list= $list;


        }


        //Store all array
        public function storeToDo(){

        }


        // Add a new List within a Todo List
        public function createTodo($id,$name, $list = [])
        {

            $this->id = $id;
            $this->name = $name;
            $this->list = $list;

            // changing obj to array format
            return $this->toDoFileArray= (array)$this;


        }

        //Show all ToDo List
        public function getAllTodo()
        {

            $toDoFileArray = [];
            // Printing all the keys and values one by one
            $name = array_keys($toDoFileArray);
            for($i = 0; $i < count($toDoFileArray); $i++) {
                echo $name[$i] . "{<br>";
                foreach($toDoFileArray[$name[$i]] as $key => $list) {
                    echo $key . " : " . $list . "<br>";
                }
                echo "}<br>";
            }
        }
        //Show a specific list
        public function getATodo($id)
        {
            $toDoFileArray = [];
            foreach($toDoFileArray as $name => $value){
                if($name==$id) return $value;
                if(is_array($value)){
                    $find = getData($value, $id);
                    if($find){
                        return $find;
                    }
                }
            }
            return $toDoFileArray;
        }


        public function updateTodoName($id, $name)
        {

        }

        public function updateTodoList($id, $list)
        {
        }

        public function deleteTodoListItem( $key, $value)
        {

        }




        public function deleteTodo($id)
        {
            //Declare the array todo list
            $toDoFileArray = [];
            // unset / delete the specific index
            unset($toDoFileArray [$id]);
            //return the array
            return $toDoFileArray;
        }


        //Stop the operation
        public function quit(){
            exit('Todo List closed');
        }


    }


   // Create object for class(hotel)
$todo = new Controller;


var_dump($todo->getATodo(  "spider-man"));

