<?php

function LoadFile($filename){
    $myfile = fopen($filename, "r") or die("Unable to open file!");
    return fread($myfile, filesize($filename));
}

function SaveFile($filename, $content){
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    return fwrite($myfile, $content);
}

if($_SERVER['REQUEST_METHOD'] === 'POST')  {
    $parameter1 = $_POST["parameter1"];
    $parameter2 = $_POST["parameter2"];
    
    if(is_null($parameter1)) $parameter1 = "";
    if(is_null($parameter2)) $parameter2 = "";
    
    $filename = __DIR__ . './template/template.html';
    $content = LoadFile($filename);
    
    $content = str_replace("%param%", $parameter1,  $content);
    $content = str_replace("%param2%", $parameter2,  $content);
    
    $filename = __DIR__ . './html/index.html';
    $written = SaveFile($filename, $content);
    
    if(!$written)
        $ret = (object) array( 'success' => false,'message'=>'Error on file write');
    else
        $ret = (object) array( 'success' => true, 'message'=>'file updated', 'path' => './html/index.html', 'content' => $content);
    
} else{
    $ret = (object) array( 'success' => false,'message'=>'No post mode');
}

$jsonRes = json_encode($ret);

header('Content-Type: application/json');
echo $jsonRes;

?>