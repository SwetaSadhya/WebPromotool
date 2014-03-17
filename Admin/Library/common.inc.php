<?php
//---------------------------file path------------------------------------------------
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT',DOC_ROOT.'/test1/');// it will change with foldername of site if no foldername then just write "/"
define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/test1/');
//define('IMAGE_PATH',SITE_PATH.'images/');
//define('CSS_PATH',SITE_PATH.'css/');
//define('JS_PATH',SITE_PATH.'js/');
define('LIBRARY_ROOT',SITE_ROOT.'Lib/');
define('VIEW_PATH',SITE_ROOT.'View/');
define('MODEL_PATH',SITE_ROOT.'Model/');

//--------------------------------load common view----------------------------------------------
function loadView($templateName,$arrPassValue=''){

         $view_path=VIEW_PATH.$templateName;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrData=$arrPassValue;
				 //print_r( $arrData);
            }
            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}
//-------------------------------load common model--------------------------------------------
function loadModel($modelName,$function,$arrArgument=''){
         $model_path=MODEL_PATH.$modelName.'.php';

         if(file_exists($model_path)){
            if(isset($arr)){
                 $arrData=$arrPassValue;
            }

            include_once($model_path);
            $modelClass=$modelName;
            if(!method_exists($modelClass,$function)){
                die($function .' function not found in Model '.$modelName);
            }

            $obj=new $modelClass;
            if(isset($arrArgument)){
                return $obj-> $function($arrArgument);
            }else{
                return $obj-> $function();
            }
         }else{
            die($modelName. ' Model Not Found under Model Folder');
         }

}
//----------------------------load view customer tab of promotion----------------------------------------
function loadView_CustomerSelectOption($templateName,$arrPassValue='',$arrPassValue2='',$arrPassValue3='',$arrPassValue4=''){

         $view_path=VIEW_PATH.$templateName;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrData=$arrPassValue;
				 $arrData2=$arrPassValue2;
				 $arrData3=$arrPassValue3;
				 $arrData4=$arrPassValue4;
            }

            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}
?>