<!DOCTYPE html>
<html lang="en">

<head>
    <script src="./script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>MUT</title>
</head>
<body>
<h2>MANAGER UPDATE TRACKER</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Create Room</button>
<?php
  $conn = mysqli_connect("localhost", "root", "", "MUT");
  if($conn-> connect_error){
      die("Connection failed:". $conn-> connect_error);
  }
  $sql = "SELECT GName from Groups";
  $result = $conn-> query($sql);
  if($result-> num_rows > 0)
  {
      while($row = $result-> fetch_assoc()){
          echo "
          <button onclick=\"GetMembers('".$row["GName"]."')\" style='width:auto;'>".$row["GName"]."</button>
          ";
      }
  }
  else{
      echo "0 results ";
  }
  $conn-> close();
?>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="./actionpage.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Enter Group detailes</h2>
          </div>
          <div class="container">
            <label for="uname"><b>Group Name</b></label>
            <input type="text" placeholder="Enter Username" name="GroupName" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" required>
            <button type="submit">Create group</button>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          </div>
        </form>
    </div>
    <div class="listViewer" style="display">
        <?php
        $groupName="";
        if(isset($_GET['RoomName'])){
          $groupName = $_GET['RoomName'];
          echo "<div id=\".$groupName.\">";
          echo "<h2>List of Members in ".$groupName."</h2> 
          <button onclick=\"document.getElementById('id02').style.display='block';\" style=\"width:auto;\">ADD MEMBER</button>
          <button onclick=\"document.getElementById('id03').style.display='block';\" style=\"width:auto;\">Update message</button>";
          echo "<p>Demo Text of description of Sankalp block</p>";
          //connection to the data base of team members
          $conn = mysqli_connect("localhost","root","","MUT");
          if($conn-> connect_error){
            die("Connection failed:". $conn-> connect_error);
          }
          $sql = "SELECT MemberName,message from teammembers where GName='".$groupName."'";
          $resultM = $conn-> query($sql);
          if($resultM !== false && $resultM-> num_rows > 0)
          {
              while($row = $resultM-> fetch_assoc()){
                  echo "
                  <button class=\"accordion\">".$row["MemberName"]."</button>
                  <div class=\"panel\">
                    <p>".$row['message']."</p>
                </div>
                  ";
              }
          }
        }
        ?>
    </div>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="./addmember.php" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Add member Detailes</h2>
          </div>
          <div class="container">
            <label for="groupname"><b>Group Name</b></label>
            <input type="text" placeholder="Enter Username" name="groupname" required>
            <label for="nameofmember"><b>Member Name</b></label>
            <input type="text" placeholder="Enter name" name="nameofmember" required>
            <button type="submit">Add member</button>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
          </div>
        </form>
    </div>
    <div id="id03" class="modal">
        <form class="modal-content animate" action="./updatemessage.php" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Add member Detailes</h2>
          </div>
          <div class="container">
            <label for="groupname"><b>Group Name</b></label>
            <input type="text" placeholder="Enter Group" name="groupname" required>
            <label for="nameofmember"><b>Member Name</b></label>
            <input type="text" placeholder="Enter name" name="nameofmember" required>
            <label for="message"><b>Update description</b></label>
            <input type="text" placeholder="Enter name" name="update" required>
            
            <button type="submit">Update message</button>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
          </div>
        </form>
    </div>
    
<script>
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function GetMembers(gname){
      window.location.href= "index.php?RoomName="+gname;
      alert(gname);
    }
    var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
      
    </script>
</body>

</html>
