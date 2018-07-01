<?php
/**
    * @package Stack and 
    * @author Mohd Adil Taj
    * @version 0.3 | Created Saturday 30th Jun 2018 12:15 PM
    */
    require_once 'db.php';


class Stack
{
    public $stack;
    public $limit;

    public function __construct($values = array(),$limit = 10) {
        // initialize the stack
        $this->stack = array_reverse($values);
        // stack can only contain this many items
        $this->limit = $limit;
    }
     public function push($item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
          throw new RunTimeException('Stack is empty!');
      } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }
 public function top() {
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}






        $childStack;
        $connection;
        $c_id;
        $rc_id;
        $a=array();

        
        function addCriteriaFromObject($data)
        {
            $db = new MyConnection();
            $connection = $db->getConnection();
            $childStack=new Stack();
            $stmt=$connection->prepare("INSERT INTO criteria(heading,description,part,eval_level,isSubCriteria,numChildren,max_points) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("ssiiiii",$data->heading,$data->description,$data->part,$data->eval_level,$data->isSubCriteria,$data->numChildren,$data->max);
            if($stmt->execute())
            {
                $c_id=$connection->insert_id;
                for($i=0;$i<$data->numChildren;$i++)
                {
                    $childStack->push($c_id);
                }
            }
            else
            {
                echo $stmt->error;
                return 0;
            }
            print_r($childStack->stack);
            $s=count($data->children);
            echo $s;
            // echo $childStack->stack;
            add($data,$childStack);
        }

        function add($data,$childStack)
        {
            $db = new MyConnection();
            $connection = $db->getConnection();
            foreach($data->children as $d)
            {

                $rc_id=$childStack->pop();
                $stmt=$connection->prepare("INSERT INTO criteria(heading,description,part,eval_level,isSubCriteria,parent_id,numChildren,max_points) VALUES(?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssiiiiii",$d->heading,$d->description,$d->part,$d->eval_level,$d->isSubCriteria,$rc_id,$d->numChildren,$d->max);
                if($stmt->execute())
                {
                    $c_id=$connection->insert_id;
                    if($d->numChildren>0)
                    {
                        for($i=0;$i<$d->numChildren;$i++)
                        {
                            $childStack->push($c_id);
                        }
                    }   
                }
                else
                {
                    echo $stmt->error;
                    return 0;
                }
                print_r($childStack->stack);
                echo $d->heading;
                add($d,$childStack);
                        
            }
                //echo $a;
                
        }
        


?>
