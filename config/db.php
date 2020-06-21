<?php
  $user = 'root' ;
  $pass = 'sharique123' ;
  $db ='phpfeedback1' ;


  $dbase = new mysqli('localhost',$user,$pass,$db) or die ("unable to connect");


  echo "connected" ;

  $query = "select id,name,email,message,date from feedback1" ;
  $result = mysqli_query($dbase , $query);
  if(mysqli_num_rows($result) > 0){


     while($row = mysqli_fetch_assoc($result)){
       echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: ". $row["email"]." - Feedback: ". $row["message"]." - Date: ". $row["date"]. "<br>";
     }
  } else{
    echo "0 results" ;
  }

  mysqli_close($dbase);


  ?>
