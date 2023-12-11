<?php 
                    session_start();
                    ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<html>

    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f2f2f2;
        }

        .sidebar {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex: 2;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-logo {
            text-align: center;
        }

        .profile-header {
            text-align: center;
            padding: 20px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 24px;
            margin: 10px 0;
        }

        .profile-info {
            font-size: 16px;
            color: #555;
        }

        .profile-details {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }

        .profile-details span {
            font-weight: bold;
            color: #555;
        }

        .profile-actions {
            margin-top: 20px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .post {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post-content {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .post-date {
            font-size: 12px;
            color: #888;
        }

        .followers-count {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Container -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <img src="logo.jpg" width="150" height="150">
            </div>
            <ul>
                <li><a class="bar-item button active large" href="#home" ><i class="fa fa-home sidebar-icons"></i>Home</a></li><br>
                <li><a class="bar-item button active large" href="#friends" ><i class="fa fa-link sidebar-icons"></i>Friends</a></li><br>
                <li><a class="bar-item button active large" href="#profile" ><i class="fa fa-user sidebar-icons"></i>Profile</a></li><br>
                <li><a class="bar-item button active large" href="#post" ><i class="fa fa-plus sidebar-icons"></i> Post</a></li><br>
                <li><a class="bar-item button active large" href="#settings" ><i class="fa fa-cog sidebar-icons"></i>Settings</a></li><br>
                <div class="w3-dropdown-hover">
                    <button class="button">
                        <li><a class="bar-item button active large" href="#clubs" ><i class="fa fa-users sidebar-icons"></i>Clubs<i class="fa fa-caret-down"></i></a></li><br>
                    </button>
                    <div class="w3-dropdown-content w3-bar-block">
                      <a href="#" class="w3-bar-item w3-button">Voice club</a>
                      <a href="#" class="w3-bar-item w3-button">Enterpreneur club</a>
                      <a href="#" class="w3-bar-item w3-button">UI/UX club</a>
                      <a href="#" class="w3-bar-item w3-button">Coding club</a>
                    </div>
                </div> 
            </ul>
        </div>
        <?php 
                    if (isset($_GET['username'])) {
                        $user = $_GET['username'];   
           $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");
                        $sql = "SELECT * FROM campuslink where username='$user'";    
                        $res = mysqli_query($con,  $sql);
                        if($campuslink = mysqli_fetch_assoc($res)) {
        echo  '<div class="content">';
        echo '<div class="profile-header">';
        echo '<img src="uploads/' . $campuslink['profile_pic_url'] . '" alt="Result Image" width="100" height="75" style="  border-top-left-radius: 50% 50%; border-top-right-radius: 50% 50%; border-bottom-right-radius: 50% 50%; border-bottom-left-radius: 50% 50%; ">';     
        echo '       <h1 class="profile-name">';
        echo $campuslink['name'];
        echo    '<p class="profile-info">';
        echo $campuslink['role'];
        echo ' </p>';
         echo ' <p class="profile-info">';
         echo 'Email:';
         echo  $campuslink['email'];
         echo '</p>';

         echo   '</div>';}}
?>
            
            <?php 
                    
                    if (isset($_GET['username'])) {
                        $user = $_GET['username'];    
           $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");
                        $sql = "SELECT * FROM posts where username='$user'";    
                        $res = mysqli_query($con,  $sql);
                        if(mysqli_num_rows($res) > 0) {
                            while ($posts = mysqli_fetch_assoc($res)) {

                                echo     '<br>';
               echo $posts['username'];
               echo '</b>';
               echo '<div class="post" >';
               echo $posts['data'];
                
               echo '<div style="text-align: left;">';
             
               echo '</div>
               </div>';
                   
                
               
                   
                         } }}
                       ?>
            
            

    
</body>
</html>
