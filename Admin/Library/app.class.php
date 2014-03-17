<?php
require_once("class.phpmailer.php");
// app.class.php
// application object, provides global routines needed across application


class App
{
  var $error_template = 'error.php';
  var $initialized = false;
  var $updatemode=false;
  var $errors = array();
  var $error_display_type =1;
  // strip slashes recursively through array
  //== find field in table  ==================
  function SendMail($toid,$fromid,$subject,$body,$filename="",$filepath="",$mailformat=false)
{
  global $adminmailid;
					$to=$toid;
					if($fromid=="")
						$fromid=ADMIN_EMAIL;

                    $subject = $subject;
					$mailcontent =$body;
					//SendHTMLMail($to,$subject,$mailcontent);
					$mail=new phpmailer();
					$mail->AddAddress($to);
					$mail->Subject = $subject;
					$mail->Body    =$mailcontent;
					 $mail->AltBody    ="   ";
					$mail->From="Administrator";
					if($filename!="")
					{
                       			   $arrfilename=explode(",",$filename);
					   $arrfilepath=explode(",",$filepath);
					   for($i=0;$i<count($arrfilename);$i++)
						{
							$mail->AddAttachment($arrfilepath[$i], $arrfilename[$i]);
						}
					}
					$mail->IsHTML($mailformat);

					$mail->FromName=$fromid;

if(!$mail->Send())
	{
	  //echo "There was an error sending the message<br><font face='Verdana' size='2'><center></font></center>";
      return  false;
	}
return  true;
}

  //=== fill dynamic combo ========================
  function FillDynamicCombo($query,$datafield,$textfield,$selectvalue)  {

	    $model=new Model;
		$rs =$model->find_query_all($query);
		$i=1;
		$selectvalue1="";
        if(count($rs)>0){
		foreach($rs as $row){
		  if($i==1)
		  $selectvalue1=$row->$datafield;
		  
		  if($selectvalue==$row->$datafield){
			  echo"<option value='".$row->$datafield."' selected>".$row->$textfield."</option>";
			  $selectvalue1=$selectvalue;
			}
		  else {
			echo"<option value='".$row->$datafield."'>".$row->$textfield."</option>";
		   }
		   $i++;
		   }
		}
		   return $selectvalue1;
	}
 
 //=== fill static compbo===============

 function FillStaticCombo($arrStr,$selectvalue)  {
	$selectvalue1="";
	foreach($arrStr as $k=>$v){
	  if($selectvalue===$k){
		   echo"<option value=".$k." selected>".$v."</option>";
		  $selectvalue1=$selectvalue;
	  }
	  else
		   echo"<option value=".$k." >".$v."</option>";
	}
       return $selectvalue1;
}


  function clean_array(&$arr) 
  {
    foreach ($arr as $k => $v) {
      if (is_array($v))
        App::clean_array($arr[$k]);
      else
        $arr[$k] = stripslashes($v);
    }
  }
   function empty_array(&$arr) 
  {
    foreach ($arr as $k => $v) {
      if (is_array($v))
        App::clean_array($arr[$k]);
      else
        $arr[$k] ="";
    }
  }

  // trim whitespace recursively through array
  function trim_array(&$arr) 
  {
    foreach ($arr as $k => $v) {
      if (is_array($v))
        App::trim_array($arr[$k]);
      else
        $arr[$k] = trim($v);
    }
  }

	function isError($value)
    {
		if(isset($value))
	        return true;
		else
			return false;
    }
  // if the given object is is not set , report an unexpected error.
  function check_db_error($obj, $errmsg = '##Database Error##')
  {
    if ($this->isError($obj))
      $this->abort($errmsg, ': ', mysql_error());
  }

  // report an internal error. takes a variable list of error message strings,
  // which will be concatenated to form the error message. error message may
  // have embedded multi-language strings.
  //chaeck request funcatio
  function checkrequest($name)
 {
	 if($this->is_post()||$this->updatemode==true){
		 return $_REQUEST[$name];
/*		 if(isset($_REQUEST[$name])) {
			 return $_REQUEST[$name];
		 }
		 elseif($_REQUEST[$name]=="") {
		    return "";
		}*/
    }
	else
	    return "";
 }

	  
  function abort()
  {
	global $appDisplay;
    $args = func_get_args();
    if (empty($args))
      $errmsg = '(##Unknown error##)';
    else
      $errmsg = implode('', $args);

    // if we are still in request initialization phase,
    // don't attempt to display an error template and do
    // language translation. just raise a php error.
	if(isset($GLOBALS['aborting']))
	  {
    if (!$this->initialized || $GLOBALS['aborting']) {
      $errmsg = preg_replace('/\x23\x23(.*?)\x23\x23/s', '$1', $errmsg);
      trigger_error($errmsg );
    }}
    $GLOBALS['aborting'] = true;

    // release any database locks, because error reporting will
    // raise errors about the languages table not being locked

    mysql_query('unlock tables');
	$this->error($errmsg);
    // display error 
	$this->error_display_type=3;
	$appDisplay->ShowErrorMsg();
//	require_once($this->error_template);
	   // $this->redirect($this->error_template);
    exit;
  }

  // take an "absolute" URL (starting with '/') and make it
  // absolute from doc root. all other urls are passed through.
  // $attrs is optional array of key/value attributes to be added
  // to the URL as a query. if $encode is true, the $url is
  // urlencoded, except for :, /, and # chars, which are assumed
  // to be part of the scheme, path, or fragment. if $full is
  // true, the full scheme, sever, and port portions are added.
  function url($url = false, $attrs = false, $encode = true, $full = true)
  {
	
    if ($url === false)
      $url =  $_SERVER['SCRIPT_NAME'];
    elseif (substr($url, 0, 1) == '/') {

      $url = DOC_ROOT . substr($url, 1);
	  		
      if ($full) {
        $scheme = 'http';
		if(isset($_SERVER['HTTPS']))
			{
        if ($_SERVER['HTTPS'] == 'on'){ $scheme .= 's';}}
        $url = "$scheme://" . $_SERVER['HTTP_HOST'] . "$url";
      }
    }


    if ($encode) {
      $url = rawurlencode($url);
      $url = str_replace('%2F', '/', $url);
      $url = str_replace('%23', '#', $url);
      $url = str_replace('%3A', ':', $url);
      $url = str_replace('%7E', '~', $url);
    }
    $query = '';
    if (!empty($attrs))
      $query = '?' . $this->array_to_query($attrs);
	
    return $url . $query;
  }

  // issue a redirect and stop execution. if $url is false, a redirect
  // to self is issued.
  function redirect($url = false, $attrs = false)
  {
	 echo "<script>document.location.href='".$this->url($url, $attrs, true, true)."'</script>";
//    header('Location: ' . $this->url($url, $attrs, true, true));
   // header('Location: login.php');
    exit;
  }

  // convert an assoc array to a string of element attributes,
  // with each attribute value HTML-escaped
  function array_to_attrs($attrs)
  {
    $temp = array();
    foreach ($attrs as $name => $value) {
      $temp[] = $name . '="' . htmlspecialchars($value) . '"';
    }
    return implode(' ', $temp);
  }

  // convert an assoc array to a query string, with each attribute
  // value URL-encoded. The result is NOT html-escaped.
  function array_to_query($attrs)
  {
    $temp = array();
    foreach ($attrs as $name => $value) {
      $temp[] = rawurlencode($name) . '=' . rawurlencode($value);
    }
    return implode('&', $temp);
  }

  // returns true if this is a POST request
  function is_post()
  {
	    
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  // returns true if administrator is logged in
  function is_admin()
  {
	if(isset($_SESSION['ISADMIN']))
	  {
		return $this->check_session($_SESSION['ISADMIN']);
	  }
	  else
	  {
		  return false;
	  }
  }
 function is_user()
  {
	if(isset($_SESSION['ISUSER']))
	  {
		return $this->check_session($_SESSION['ISUSER']);
	  }
	  else
	  {
		  return false;
	  }
  }

  function Admin_ID()
  {
	  if(isset($_SESSION['ADMINID']))
    return $this->check_session($_SESSION['ADMINID']);
	  else 
		  return "";
  }
  function User_ID()
  {
	  if(isset($_SESSION['USERID']))
    return $this->check_session($_SESSION['USERID']);
	  else
		  return "";
  }

  function User_Type()
  {
	  if(isset($_SESSION['USERTYPE']))
    return $this->check_session($_SESSION['USERTYPE']);
	  else
		  return "";
 }

  // adds an error message to accumulated request errors.
  // any embedded language texts will be translated
  function error()
  {
    global $lang;
    $args = func_get_args();
    $errmsg = (implode('', $args));
    $this->errors[] = $errmsg;
  }

 function show_mail_error()
 {
   if(isset($_REQUEST["err_mail_no"])){

	   $errmsg="An error has occurred while sending the mail.";
	   $this->error($errmsg);
	    $this->abort("Mail Error ", $errmsg);
		// display error 
//		$this->error_display_type=3;
//		$appDisplay->ShowErrorMsg();
	   exit;
   }
 }
 function check_session($val)
 {
	  return $val;

   $errmsg="Session has been expired.";
   if(isset($val)) return $val;

   $this->abort("Session Error ", $errmsg);
//   $this->redirect($this->error_template);
   exit;
 }
 function session_error()
 {
   global $smarty;
   $errmsg="Session has been expired.";
   // $this->error($errmsg);
   //   $this->error_display_type=2;
   $this->abort("Session Error ", $errmsg);
   $this->redirect($this->error_template);
   exit;
 }
 
  // verify that user is logged in, and redirect to login
  // page if necessary
  function check_login($prompt = '')
  {
    if (isset($_SESSION['USERID'])){
		if($_SESSION['USERID']<>"")
			return;
		else
			$this->show_session_error();
	 }
	else{
		    $this->redirect('/login.php');
	}
  }



function UploadFile($filen,$filepath)
{

if(!move_uploaded_file($_FILES[$filen]["tmp_name"],$filepath))
{
	echo"Could not copy file";
	//exit;
}
}
function ImageResize($filepath,$savefilepath,$imagetype,$w,$h)
{
	$filename=$filepath;
	$full_url=$savefilepath;
	// Get new dimensions
	list($width, $height) = getimagesize($filename);
	// image width
	$sw = $width;//$x[0];
	// image height
	$sh = $height;//$x[1];
    $percent=0;
	$fixH=0;
	$fixW=0;
if ($percent > 0) {
    // calculate resized height and width if percent is defined
    $percent = $percent * 0.01;
    $w = $sw * $percent;
    $h = $sh * $percent;
} else {
    if($sw>$sh){
		if($sw>$w){//--take ration
			$fixW=$w;
			$fixH=($w/$sw)*$sh;
			if($fixH>$h){
				$imageErr=0;
				return $imageErr;
			}
		}
		elseif($sw<=$w){
			if($sh>$h){
				$imageErr=1;
				return $imageErr;
			}
			else{
				$fixH=$sh;
				$fixW=$sw;
			}
		}
	}
	elseif($sw<=$sh){
		if($sh>$h){//--take ration
			$fixH=$h;
			$fixW=round(($h/$sh)*$sw,2);

			if($fixW>$w){
				$imageErr=2;
				return  $imageErr;
			}
		}
		elseif($sh<=$h){
			if($sw>$w){
				$imageErr=3;
				return  $imageErr;
			}
			else{
				$fixH=$sh;
				$fixW=$sw;
			}
		}
	}
}

$new_width=$fixW;
$new_height=$fixH;

//echo $fixH."s".$fixW;
//exit;
// Resample
$image_p = imagecreatetruecolor($new_width, $new_height);

if(strtolower($imagetype)=="jpg"||strtolower($imagetype)=="jpeg"){
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
//imagejpeg($image_p, null, 100);

imagejpeg($image_p,$full_url,100);
}
elseif(strtolower($imagetype)=="gif"){	
	$image = imagecreatefromgif($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagegif($image_p,$full_url,100);
}
elseif(strtolower($imagetype)=="png"){
	$image = imagecreatefrompng($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagepng($image_p,$full_url,100);
}

imagedestroy($image); 
$imageErr=-1;
return $imageErr;



}

function uploadImgeWithResize($fieldname,$savepath,$folder,$fileprefix,$width,$height,$mainUpload=true,$mainDelete=true){

	    global $sBigImagefile;
		global $util;
	    $frfilename=$_FILES[$fieldname]["name"];
	    $code=$util->randomstring(6);
        $strsavefilepath=$folder."/".$fileprefix."main".$code.".".$util->getFileextension($frfilename);
		$sBigImagefile=$strsavefilepath;
		$strmainfilepath= $savepath.$strsavefilepath;
		if($mainUpload==true)
 		$this->UploadFile($fieldname,$strmainfilepath);
        elseif(isset($_SESSION["MAINFILENAME"])){
			$strsavefilepath=$_SESSION["MAINFILENAME"];
		    $strmainfilepath= $savepath.$strsavefilepath;
		}
		else
  		  $this->UploadFile($fieldname,$strmainfilepath);

		$_SESSION["MAINFILENAME"]=$strsavefilepath;
		
		$sBigImagefile=$strmainfilepath;
		chmod($strmainfilepath,0755);
 		$mainfilepath=realpath($strmainfilepath);
	    $strfilepath=$folder."/".$fileprefix."_".$code.".".$util->getFileextension($frfilename);
	
		
		copy($mainfilepath,realpath($savepath.$strfilepath));
	
		$imageError=$this->ImageResize($strmainfilepath,$savepath.$strfilepath,$util->getFileextension($frfilename),$width,$height);

       
		if($mainDelete==true){
			if(!unlink($strmainfilepath)){
             echo "Not Delete file";
              exit();
			}
		}
		
		if($imageError==-1)
  		  return $strfilepath;
		else{
			
		  return -1;
		}
}

function makeFile($filepath,$strText)
{
   if (!file_exists($filepath)) {
   		$handle = fopen($filepath, "w");
		fwrite($handle, $strText);
		
		fclose($handle);
   }
}

function deleteFile($filepath)
{
   if (file_exists($filepath)) {
   		unlink($filepath);
   }
}


function downloadFile($filename,$filepath)
{


    header("Content-type: application/octet-stream"); 
    header("Content-disposition: attachment; filename=".$filename); 
    header("Content-Length: " . filesize($filepath));
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile($filepath); 


flush;
exit;
}



}//end classs
?>
