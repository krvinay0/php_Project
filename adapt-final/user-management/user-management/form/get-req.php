<?php 
    require_once '../config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['form_submit']) )
    { 
    extract($_POST);
    $conn->query("INSERT INTO `req-call` (name,email,mob,message) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['message']."') ");
     
    
    echo "<script>";
    echo "alert('Your Req successfully send.');";
    echo "window.location='http://your-website-name.com';";
    echo "</script>";
    $msg="Your Request accept";
    
    
    $_SESSION['form_submit']='true';
    
    } 
   else
   header("Location: http://your-website-name.com");

?>