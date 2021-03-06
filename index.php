<?php
// Flag value declared FALSE in start
$msg = FALSE;

if(isset($_POST['name'])){
    // connecton variables
    $server = "localhost";
    $username = "root";
    $password = "";


    // Creating connection
    $con = mysqli_connect($server, $username, $password);

    // Checking connection
    if(!$con){
        die("connection to this database failed due to- " . mysqli_connect_error());    
    }

    // Collect POST variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $marital = $_POST['marital'];
    $other = $_POST['other'];    

    $sql = "INSERT INTO `demo_form`.`form_data` (`name`, `gender`, `age`, `email`, `phone`, `marital`, `other`, `currentdt`) VALUES ('$name', '$gender', '$age', '$email', '$phone', '$marital', '$other', current_timestamp());";
    // echo $sql;
    

    if ($con->query($sql) === TRUE) {
        // Flag for successful insertion
        $msg = TRUE;
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }

    // Closing connection
    $con->close();
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet"> 
    <title>Submit this form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <img class="bg" src="img/bg.jpg" alt="Background image">
    <div class="topspace">
        <p></p>
    </div>
    <div class="container">
        <h1>This is My Sample Form</h1>
        <h3>Please Enter Your Details Here.</h3>
        <!-- when flag is true this section gets executed and displays the message. -->
        <?php
            if($msg == TRUE){
                echo '<p class="submitmsg">Congratulations your form has been submitted successfully</p>';
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="     Enter Your Full Name" >
            <input type="text" name="gender" id="gender" placeholder="     Enter Your Gender" >
            <input type="text" name="age" id="age" placeholder="     Enter Your age" >
            <input type="email" name="email" id="email" placeholder="     Enter Your email" >
            <input type="phone" name="phone" id="phone" placeholder="     Enter Your Phone no" >
            <input type="text" name="marital" id="marital" placeholder="     Enter Your Marital Status" >
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other details here."></textarea>
            <div class="button">
                <button class="btn">Submit</button>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>