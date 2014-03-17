<?php
// main class that everything inherits
class Grandpa 
{
public $id;
public $name;
public $test1;
public $test2;

    public function __construct($id,$name,$test1,$test2){
        $this->GrandpaSetup($id,$name);
		$this->GrandpaList($test1,$test2);
    }

    public function GrandpaSetup($id,$name){
       $this->id = $id;
        $this->name = $name;
    }
	 public function GrandpaList($test1,$test2){
       $this->test1 = $test1;
        $this->test2 = $test2;
    }
}

class Papa extends Grandpa
{
public $age;
public $mob;

    public function __construct($id,$name,$age,$mob)
    {
        // call Grandpa's constructor
        parent::__construct($id,$name);
        $this->age = $age;
		$this->mob = $mob;
    }

}
class Kiddo extends Papa
{
    public function __construct()
    {
        $this->GrandpaSetup();
    }
}



print_r (new Papa('1','Sweta','28','1254352'));
