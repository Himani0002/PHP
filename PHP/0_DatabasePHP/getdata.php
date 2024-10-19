<?php
  
  include 'getConnection.php';
  $conn = OpenCon();

  $sql = "SELECT Deptid, Deptname FROM Department";
 
  $result = $conn->query($sql);  //Execute the query and get the result set

  if ($result->num_rows > 0) {   //Check if there are any rows in the result set

      echo "<select name='Department'>";   //Output data of each row as an HTML option

      while ($row = $result->fetch_assoc()) {

          echo "<option value='" . $row["Deptid"] . "'>" . $row["Deptname"] . "</option>";
      }
      echo "</select>";
      
  } 
  else
  {
      echo "No records found";
  }

  $result->free_result();  //^ Free up the result set memory and close the database connection

//   CloseCon($conn);



?>