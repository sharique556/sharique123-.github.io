<?php
  $user = 'root' ;
  $pass = 'sharique123' ;
  $db ='phpfeedback1' ;


  $dbase = new mysqli('localhost',$user,$pass,$db) or die ("unable to connect");


  //--------------------------//
/*  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    $query = "insert into feedback1(name,email,gender,message) values ('".$name."', '".$email."' ,'".$gender."','".$message."')" ;
    $run = mysqli_query($dbase,$query);
    if($run == TRUE )
    {
      echo "Feedback successfully recorded" ;
    } else{
      echo "not inserted" ;
    }
  }
*/

  ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="online-exam-portal">
    <title> online-exam-portal-HOME </title>
      <link rel="stylesheet" type="text/css" href="./css/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <style>
                        .error {color: #FF0000;}
      </style>
  </head>
    <?php
         $nameErr = $emailErr = $genderErr = $messageErr = "";
         $name=$email=$gender=$message="";


         if ($_SERVER["REQUEST_METHOD"] == "POST")
         {
           /*name checking*/
           if(empty($_POST["name"]))
           {
             $nameErr = "Name is required" ;
           }
           else {
             $name = test_input($_POST["name"]);
             if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
               $nameErr = "Only letters and white space allowed";
             }
          }
            /*email checking*/
          if(empty($_POST["email"]))
          {
                $emailErr = "Email is required" ;
                }
                else
                {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                              $emailErr = "Invalid email format";
                    }
                  }

         /*gender checking*/
         if(empty($_POST["gender"]))
         {
           $genderErr = "Gender is required" ;
         }
         else {
                $gender = test_input($_POST["gender"]);
           }
           /* message checking */
         if (empty($_POST["message"]))
         {
             $message = "";
           }
         else {
             $message = test_input($_POST["message"]);
           }

         if($nameErr == "" and $emailErr == "" and $genderErr == "" and $messageErr == "")
         {
              if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $message = $_POST['message'];

                    $query = "insert into feedback1(name,email,gender,message) values ('".$name."', '".$email."' ,'".$gender."','".$message."')" ;
                    $run = mysqli_query($dbase,$query);
                    if($run == TRUE )
                    {

                         echo "Feedback successfully recorded" ;
                         
                    } else{
                         echo "please fill the field correctly" ;
                    }
                                        }

         }
      }



         function test_input($data)
         {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data ;

         }
     ?>


    <header>
      <div id="container">
        <div id="branding">
          <h1> <span class =" highlight" style="color:#007e00;font-weight:bold;font-size:4vw" ><strong>Examination Portal</strong></span> </h1>
          <h2 style="color:#007e00;font-weight:bold;font-size:2vw">CALCUTTA INSTITUTE OF TECHNOLOGY (CIT), HOWRAH </h2>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="home.php">Home</a></li>
            <li> <a href="courses.php" style="font-size:1vw">Courses</a></li>
            <li> <a href="resources.php" style="font-size:1vw">Resources</a></li>
            <li> <a href="feedback.php" style="font-size:1vw">Feedback</a></li>
            <li><a href="#" data-toggle="popover" data-placement="bottom" title="Contact Here" data-content="E-mail: sharique.shakil.9@gmail.com Address: 81E Topsia Road kolkata-39" style="font-size:1vw">Contact Us</a>
              <script>
                            $(document).ready(
                            function(){
                            $('[data-toggle="popover"]').popover();
                            }
                          );
              </script>
          </li>
         </ul>
       </nav>
     </div>
   </header>
  <p> <span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container_feedback">
         <h1><small><b> Feedback form </b></small></h1>
         <label for="name">Name: </label>
         <input type="text" name="name" id="name" required value="<?php echo $name;?>">
         <span class="error">* <?php echo $nameErr;?></span>
         <br>
         <label for="email">Enter your email :</label>
         <input type="text" id="email" name="email" required value="<?php echo $email;?>">
         <span class="error" required>* <?php echo $emailErr;?></span>
         <br>
         <label for="gender">Gender : </label>
         <input type="radio" name="gender"  required <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female
         <input type="radio" name="gender"  required <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
         <input type="radio" name="gender" required <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
         <span class="error">* <?php echo $genderErr;?></span>
         <br>
         <label for="message">Write your feedback here :</label>
         <textarea name="message" id="message" rows="5" cols="15" required><?php echo $message;?> </textarea>
         <br>
        <input type="submit" id="submit" name="submit" value="Submit">

 </div>
</form>

  <?php
  echo "<h2>Your Input:</h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $gender;
  echo "<br>";
  echo $message;
  ?>
</body>
</html>
