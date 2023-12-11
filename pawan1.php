<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>


</head>

    <style>
    .div-1 {
        background-color: #EBEBEB;
        
    }
    </style>
<body>
    <div class="div-1" >
    
<center>
<form method="POST">
    Username <input type='text' id="username" name="username" /><br>
    Password <input type='password' id="pass" name="pass" /><br>
    Email <input type="email" id="mail" name="mail" /><br>
    Name <input type='text' id="name1" name="name1" /><br>
    Mobile <input type='text' id="num" name="num" /><br>
    Year of Joining <input type="text" id="year" name="year" /><br>
    Branch <input type="text" id="branch" name="branch" /><br>
    <input type="submit" value="Register" name="submit" id="submit"/>
</form>
</div>

<?php
if(isset($_POST['name']) && isset($_POST['pass'])){   
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['mail'];
    $mobile = $_POST['num'];
    $name = $_POST['name1'];
    $year1 = $_POST['year'];
    $branch = $_POST['branch'];
    $mydate=getdate(date("U"));

$year2=$mydate['year'];
$diff=$year1 - $year2;
if($diff < 4)
    $role = 'Alumni'; 
else 
    $role= "Student";
    $con = mysqli_connect('127.0.0.1', 'root', '', 'pawan'); 
    $q = "SELECT * FROM campuslink WHERE username='$user'"; // Use double quotes for variable interpolation
    $x = mysqli_query($con, $q);

    if(mysqli_num_rows($x) > 0) { // Changed 'mysqli_num_rows($user)' to 'mysqli_num_rows($x)'
        echo "Username is already taken.";
    } else {
        $y = "INSERT INTO campuslink(username,name,email,password,year,number,branch,role) VALUES ('$user', '$name', '$email', '$pass',  '$year1', '$mobile','$branch', '$role')";
        $z = mysqli_query($con, $y);
        if ($z) {
            echo "Sign up successful.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    mysqli_close($con);
}
?>

</body>
</html>

