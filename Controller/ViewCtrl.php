<?php

class Controller_ViewCtrl {


//--------------------------------load common view----------------------------------------------
function loadView($templateName,$arrPassValue=''){

         $view_path='../View/'.$templateName;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrData=$arrPassValue;
				 //print_r($arrData);
            }
            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}

}
?>