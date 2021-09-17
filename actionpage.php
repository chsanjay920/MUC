<?php
$connection  = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'MUT');

if(isset($_POST['GroupName'])){
    function function_alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    $text = $_POST['GroupName'];
    $password = $_POST['Password'];
    $query = "INSERT INTO `Groups`(`GName`,`Pswd`) VALUES ('$text','$password')";
    $query_rum = mysqli_query($connection,$query);

  if($query_rum){
    function_alert("Group Added");
  }
  else{
    function_alert("Some Error Occured");
  }
}

?>