<?php
  
  include 'getdata.php';

  $sql = "SELECT Eid, EFirstname, ELastname FROM Employees  WHERE EDeptid ";
 
  $result = $conn->query($sql);  //Execute the query and get the result set

  if ($result->num_rows > 0) {   //Check if there are any rows in the result set

           $Employee=$row["EDeptId"];
           $EID=101;
           foreach ($Employees as $Employee) {
   
            echo "<select name='Employees'>";   //Output data of each row as an HTML option

            while ($row = $result->fetch_assoc()) {
      
                echo "<option value='" . $row["Eid"] . "'>" . $row["EFirstname"] . " " . $row["ELastname"] . "</option>";
            }
            echo "</select>";
            
   
            $EID++;
      
          
       }    
      
  } 
  else
  {
      echo "No records found";
  }

  $result->free_result();  //^ Free up the result set memory and close the database connection CloseCon($conn);



?>