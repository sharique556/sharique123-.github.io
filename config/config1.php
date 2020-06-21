<?php
   require('config/db.php');


   $query = "select id,author,email,message,date from feedback1" ;
   $result = mysqli_query($dbase , $query);
   if(mysqli_num_rows($result) > 0){


      while($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. " - Name: " . $row["author"]. " - Email: ". $row["email"]." - Feedback: ". $row["message"]." - Date: ". $row["date"]. "<br>";
      }
   } else{
     echo "0 results" ;
   }

   mysqli_close($dbase);
   ?>
