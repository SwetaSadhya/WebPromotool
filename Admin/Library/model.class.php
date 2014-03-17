<?php

// model.class.php
// class Model, implements ORM pattern
//
// global vars used: 
//   $app
// global constants used: 
//    DB_PREFIX

require_once('db.inc.php');

class Model
{
  function Model()
  {
    if (!isset($this->_table_name))
	  {
		if(strtolower(get_class($this))=="user")
			$class="userdetail";
		else
			$class=strtolower(get_class($this));
	
		$this->_table_name = "`" . DB_PREFIX . $this->_setClassName($class) . "`";
	  }
	 	$this->_id_name="id";
    $this->_new_row = true;
  }

  // return an assoc array of attributes that are defined for the current
  // object, except for id. this does not necessarily reflect the table 
  // attributes, unless the object is the result of a "SELECT *" operation.
  function attr($obj)
  {
    $attr = array();
    foreach (get_object_vars($obj) as $k => $v)
		{
      if (substr($k, 0, 1) != '_' && $k != $this->_id_name)
        $attr[$k] = $v;

    }

    return $attr;
  }

  // get a count of rows, with optional filter
  function count($pred = '', $params = array())
  {
    $row = $this->find($pred, $params, 'count(*) as count');
    return $row->count;
  }
  function DeleteRecords($sTable,$id=0,$idname="id")
  {
	global $app;

	$this->_table_name=$sTable;
	$this->_new_row=false;
	$this->id=$id;
	$this->$idname=$id;
	$this->_id_name=$idname;
	$this->delete();
	$app->error_display_type=2;
	$app->error("Record has been successfully deleted");
   }
  // delete current row
  function delete()
  {

    if ($this->_new_row || is_null($this->id())){
     $this->raise_error('Attempt to delete row not saved');
	}
    $this->delete_all('where `'.$this->_id_name.'`='.$this->id.' limit 1');
  }

  // delete multiple rows
  // $pred = conditions and clauses following table name
  // $params = array of parameters to replace into $pred
  function delete_all($pred = '', $params = array())
  {
    global $db;
    $sql = "delete from " . $this->_table_name . " $pred";
	$this->_sqlQuery=$sql;
    $res =$this->query($sql, $params);
    $this->_check_error($res);
  }

//----------------------------checkduplicate record ----------------------------


  function checkduplicatrecord($pred = '', $params = array(), $select = '*') 
  {
    $row = $this->find($pred , $params, $select);
	if($row->_new_row==true)
		return false;
	else
		return true; 
  }
// -------------------------find a field -------------------------------------
  function findfield($table,$fieldname1,$fieldvalue1,$returnfield){
	  
	  $this->_table_name=$table;
	  $row=$this->find(" where " .$fieldname1."=?",array($fieldvalue1),$returnfield);
	  if($row->_new_row==false)
	  return $row->$returnfield;
	  else
	  return 0;
  }
//-----------------------------------------------------------------------
  // retrieve one row, or if no row found, a new object.
  // paramaters are as to find_all()
  function find($pred = '', $params = array(), $select = '*') 
  {
    $rows = $this->find_all("$pred limit 1", $params, $select);

    if (empty($rows)) {
      $row = $this->_new_from_attr();
	  		$row->_new_row = true;
    }
    else
      {
		$row = $rows[0];
		$row->_new_row = false;
	  }
    return $row;
  }


// retrieve a set of rows 
  // $pred = conditions and clauses following table name
  // $params = array of parameters to replace into $pred
  // $select = columns to select
  function find_query_all($pred = '', $params = array(), $select = '*')
  {
    global $db;
    $sql =  $pred;
    $rows = array();
	$rows =$this->getAll($sql, $params);
    $this->_check_error($rows);
	if(count($rows)>0){
		$this->_row_count=count($rows);
		//foreach ($res as $k => $row) {
		//	$this->_new_row=false;
		 // $obj = $this->_new_from_attr($row);
		  //$obj->_new_row = false;
		  //$rows[] = $obj;
		}
		
	else
		$this->_row_count=0;

    return $rows;
  }



  // retrieve a set of rows 
  // $pred = conditions and clauses following table name
  // $params = array of parameters to replace into $pred
  // $select = columns to select
  function find_all($pred = '', $params = array(), $select = '*')
  {
	  $this->_sqlQuery="";
    global $db;
	$rows = array();
    $sql = "select $select from " . $this->_table_name . " $pred";
	//echo $sql;exit;
	$rows =$this->getAll($sql, $params);
    $this->_check_error($rows);
    
	if(count($rows)>0){
		$this->_row_count=count($rows);
	   // foreach ($res as $k => $row) {
		 // $obj = $this->_new_from_attr($row);
	     // $obj->_new_row = false;
		 // $rows[] = $obj;
	    }

	else
		$this->_row_count=0;
    return $rows;
  }
  // retrieve a row given its id. if row is not found, an error
  // is raised, unless $raise is false, in which case an object
  // with no attributes set is returned (check with is_null($obj->id()))
  function get($id, $raise = true)
  {
   $sql = "select * from " . $this->_table_name . " where  ".$this->_id_name ."=". $id;
 //  echo $sql;exit;
   $this->_sqlQuery=$sql;
  
    $row = $this->getRow($sql);
	
    if (is_null($row) && $raise){
        $this->raise_error(get_class($this) . " ($id) not found");
		$obj = $this->_new_from_attr();
       $this->_row_count =0;
	}
//	
    if (!is_null($row)) {
		$class = get_class($this);
		 $obj =& new $class;
		$obj=$row;
//      $obj->set_attr($row);
       $this->_new_row = false;
       $this->_row_count =1;
    }
    return $obj;
  }

  // return id of current row
 
 function id()
  {
    $id_name = $this->_id_name;
    return $this->$id_name;
  }
 

  // lock table in requested mode (read/write)
  function lock($mode = 'write')
  {
      $res = $this->query('lock tables ! !', array($this->_table_name, $mode));
  }

  // raise an unexpected database error
  function raise_error($msg)
  {
    global $app;
    $app->abort($msg);
  }

  // save row to database. if _new_row is true, a new row is created
  // and id is set to the newly-created id.
  function save()
  {
	  $this->_sqlQuery="";
    $sql = 'update ';
    if ($this->_new_row)
      $sql = 'insert into ';
    $attr = $this->attr($this);

    if (!$this->_new_row && !is_null($this->id()))
      $attr = array_merge(array($this->_id_name => $this->id()), $attr);
    $sql .= $this->_table_name. ' set ';
    $first = true;
    foreach ($attr as $k => $v) {
      if (!$first) $sql .= ','; else $first = false;

      $sql .= "`$k`=" . $this->_quote($v);
    }

    if (!$this->_new_row)
      $sql .= " where `$this->_id_name`=" . $this->_quote($this->id());
	echo $sql;
	//exit;
	$this->_sqlQuery=$sql;
    $res = $this->query($sql);
    $this->_check_error($res);
    if ($this->_new_row) {
      $id_name = $this->_id_name;
      $this->id = $this->_insert_id();
	  $this->$id_name=$this->_insert_id();
      $this->_new_row = false;
    }
  }

  //=========run mysql query =================
  function query($sqlQuery)
  {
	  return mysql_query($sqlQuery);
  }
  // given an assoc array of field/value pairs, assigns the attributes to the 
  // current object
  function set_attr($attr)
  {
    foreach ($attr as $k => $v) {
		$this->$k = $v;
    }
  }
  //----------------------------- fetch a row from db 
  function getRow($sqlQuery)
  {
	  
	  $res=mysql_query($sqlQuery);
	  if(mysql_num_rows($res)>0)
		 return  mysql_fetch_object($res);
	  else
		  return ;
  }
  //---------------------- fetch  rows  from db and return array of row object
  function getAll($sqlQuery='',$params= array())
  {		
	  global $app;
	  $msg="";
      $this->_sqlQuery="";
	  $sQuery=$this->MakeSQLQuery($sqlQuery,$params);
//echo $sQuery;//exit;
      $this->_sqlQuery=$sQuery;
	  $res=mysql_query($sQuery) or die(mysql_error());
      $results = array();
	  if(mysql_num_rows($res)>0){
      while ($row = mysql_fetch_object($res)) { //mysql_fetch_object
		      $results[] = $row;
      }
	  }
	  return $results;
  }

//------------------------------take all field  from table
 function get_field(){
    $attr=Array();
    $result = mysql_query("SHOW FIELDS FROM ".$this->_table_name );
     $i = 0;
     while ($row = mysql_fetch_array($result)) {
        $attr[$row['Field']]="";
	 }
     return $attr;
 }
 function set_attribute(){
	$arr=array();
	$arr=$this->get_field();

	foreach ($arr as $name => $val){
		if(isset($_REQUEST[$name])&&$_REQUEST[$name])
		  $this->$name = $_REQUEST[$name];
	}

 }
function get_attribute($obj)
{ 
	foreach ($this->attr($obj) as $name => $val)
	   $_REQUEST[$name] = $val;
}

  // releases all table locks
  function unlock()
  {
    $res = $this->query('unlock tables');
  }

  function MakeSQLQuery($str='',$params= array())
  {
	  foreach($params as $k=>$v){
	   $params[$k]=$this->_quote($params[$k]);
	  }
	  $str=$this->replace_different("?",$params,$str);
	  return $str;
  }
  function replace_different($search,$replace,$string) {
   $occs = substr_count($string,$search);
   $last = 0;
   $cur = 0;
   $data = '';
   for ($i=0;$i<$occs;$i++) {
     $find = strpos($string,$search,$last);
     $data .= substr($string,$last,$find-$last).$replace[$cur];
     $last = $find+strlen($search);
     if (++$cur == count($replace)) {
       $cur = 0;
     }
   }
   return $data.substr($string,$last);
 }

  // validates current row, returns true if ok, false if
  // not. errors are placed in $app->errors array
  function validate()
  {
    global $app;
    return empty($app->errors);
  }

  // general validation assertion
  function validate_expr($label, $assert, $errmsg)
  {
    if ($assert) return true;
    $this->_validate_error($label, $errmsg);
    return false;
  }

  // validate that $value is an integer
  function validate_int($label, $value, $errmsg = 'must be an integer')
  {
    return $this->validate_expr($label, preg_match('/^\s*-?\d+\s*$/', $value), $errmsg);
  }

  // validate that $value is between $min and $max, inclusive
  function validate_range($label, $value, $min, $max)
  {
    return $this->validate_expr($label, $value >= $min && $value <= $max, sprintf('must be between %s and %s', $min, $max));
  }

  // validate that $value is not blank
  function validate_required($label, $value)
  {
    return $this->validate_expr($label, trim($value) != '', 'is required');
  }

  // "private" methods

  // check for a database error
  function _check_error($obj, $msg = 'Database Error')
  {
	global $app;
    if (!$app->isError($obj)) 
	  {
		$this->raise_error($msg . ': ' .$obj->getMessage(). mysql_error());
	  }
	  return ;
  }

  // return id of last inserted row (MySQL-specific)
  function _insert_id()
  {
    global $db;
    return mysql_insert_id();
  }

  // given as assoc array of attrs, create and return a new row
  // object
  function _new_from_attr($attr = array())
  {

    $class = get_class($this);
    $obj =& new $class;
    $obj->set_attr($attr);
    return $obj;
  }

  // pluralize a name
  function _setClassName($name)
  {
    return "${name}";
  }

  // quote a value
  function _quote($val)
  {
    return $this->quoteSmart($val);
  }
  function quoteSmart($in)
    {
        if (is_int($in) || is_double($in)) {
            return $in;
        } elseif (is_bool($in)) {
            return $in ? 1 : 0;
        } elseif (is_null($in)) {
            return 'NULL';
        } else {
            return "'" . mysql_real_escape_string($in) . "'";
        }
    }

  // record a validation error
  function _validate_error($label, $errmsg)
  {
    global $app;
    $app->error("$label: ", $errmsg);
    return false;
  }
  //-------------------------------------- Count total pages---------------------------------
function totalPages($strsql)
	{
		global $limit;
		global $nTotalrows;
		global $nTotalpage;
		$rs1=mysql_query( $strsql)or die("query failed11".mysql_error());
		$rowno=mysql_num_rows($rs1);

		if($rowno>0)
			$nTotalpage=ceil($rowno/$limit);
		else
			$nTotalpage=0;
		$nTotalrows=$rowno;
	}

//----------------------------------------------------------------------------------------------




}

?>
