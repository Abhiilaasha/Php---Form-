<?php
$insert=false;
if(isset($_POST['name'])){
   //Set connection variables
   $server  =  "localhost";
   $username = "root";
   $password = "";
// Create a connection
   $con = mysqli_connect($server ,$username, $password);
  
//Check for connection success
   if(!$con) {
    die("connection to this database failed due to"  .
    mysqli_connect_error());
   }
  // echo "Sucess connecting to the db" ;
 $name =$_POST['name'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $desc=$_POST['desc'];
 
$sql = " INSERT INTO `trip` . `trip` (`name` , `age` , `gender`, `email`, `phone`, `other`, `dt`) VALUES  ('$name', '$age', '$gender', '$email', '$phone', ' $desc',NOW());";

//echo $sql;
if($con->query($sql)== true){
   // echo "Successfully inserted" ;
   $insert = true;
}
else{
    echo "Error : $sql<br> $con->error";
    

}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class ="bg" src="bg.jpg" alt="AIT">
    <div class="container">
        <h1> Welcome to the JUNGLE Trip form </h1>
        <p> Enter your details to confirm your participation in the trip</p>
        <?php
        if ($insert == true){
        echo "<p class='submitMsg'> Welcome the LIFE of Peace and Happiness</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="ENTER YOUR NAME">
            <input type="text" name="age" id="age" placeholder="ENTER YOUR AGE">
            <input type="text" name="gender" id="gender" placeholder="ENTER YOUR GENDER">
            <input type="email" name="email" id="email" placeholder="ENTER YOUR E-MAIL">
            <input type="phone" name="phone" id="phone" placeholder="ENTER YOUR PHONE NUMBER">
            
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="ENTER ANY OTHER INFORMATION "> </textarea>
             
            <button class="btn"> Submit </button>
            


        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

<!-----CREATE TABLE `trip`.`trip` (`sno` INT(3) NOT NULL , `name` TEXT NOT NULL , `age` INT(10) NOT NULL , `gender` VARCHAR(3) NOT NULL , `email` VARCHAR(25) NOT NULL , `phone` INT(10) NOT NULL , `other` TEXT NOT NULL , `dt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB;//-->