<?php
/*
Created by Sweta on 28 Jan 2014
DB Connection
*/

Class Model_DbConnection {

	private $host="localhost";
    private $username="root";    // specify the sever details for mysql
    private $password="promo2014";
    private $database="promotool";
    public $myconn;
	
	// Constructor opens a connection to MySQL 
	public function __construct() {
		
	}
	// create a function for connect database
	function connectToDatabase() 
    {

        $conn= mysql_connect($this->host,$this->username,$this->password,$this->database);
		
		mysql_select_db($this->database);

        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }

        else
        {

             $conn;

           // echo "Connection established";

        }

        return $conn;

    }
	
	// selecting the database.
	function selectDatabase() 
    {
        mysql_select_db($this->database);  //use php in build functions for select database

        if(mysql_error()) // if error occurred display the error message
        {

            echo "Cannot find the database ".$this->database;

        }
         echo "Database selected..";       
    }
	
	// close the connection
	function closeConnection() 
    {
        mysql_close($this->myconn);

        echo "Connection closed";
    }
	
}
?>