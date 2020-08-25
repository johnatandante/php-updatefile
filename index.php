<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" >
<html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
    
     
?>
<head>
    <!--link rel="stylesheet" href="css/style.css"-->
	
    <title>My First Php Form for Pixel S.C.</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/ajaxStuff.js"></script>
</head>
<body>
<h1>Operator Form</h1>
<div >
    
    <div id="container" style="boder:1px solid;"></div>
    <div>
        <label>Items to select</label>
        <select id="myvalues" name="myvalues">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="5">5</option>
          </select>
        
    </div>
    
    <button id="EvaluateBtn" onclick="Evaluate()">Update Content</button>
    
</div>
<script>
$(document).ready(function() {
    Evaluate(false);  
    
});
  
</script>
</body>
    