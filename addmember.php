<?php
          $connection  = mysqli_connect("localhost","root","","MUT");
          $db = mysqli_select_db($connection,'teammembers');

          if(isset($_POST['nameofmember'])){
            
              function function_alert($msg) {
                  echo "<script type='text/javascript'>alert('$msg');</script>";
              }
              $text = $_POST['nameofmember'];
              $groupname = $_POST['groupname'];
              $someText = "empty";
              
              
              $query = "INSERT INTO `teammembers`(`GName`,`MemberName`,`message`) VALUES ('$groupname','$text','$someText')";
            $query_rum = mysqli_query($connection,$query);

            if($query_rum){
              function_alert("Group Added");
            }
            else{
              function_alert("Some Error Occured");
            }
          }
        ?>