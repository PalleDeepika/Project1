<?php 
if(isset($_POST['submit1']))

{
    $user = $_POST['id1'];
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
    $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");
    $q = "SELECT * FROM campuslink WHERE username='$user'"; // Use double quotes for variable interpolation
    $x = mysqli_query($con, $q);

    if(mysqli_num_rows($x) > 0) { // Changed 'mysqli_num_rows($user)' to 'mysqli_num_rows($x)'
        echo "Username is already taken.";
    } else {
        $y = "INSERT INTO campuslink (username,name,email,password,year,number,branch,role) VALUES ('$user', '$name', '$email', '$pass',  '$year1', '$mobile','$branch', '$role')";
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