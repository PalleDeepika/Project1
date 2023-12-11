<?php
session_start();
?>
<html>
    <head>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lucida Handwriting">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .font {
              font-family: "Lucida Handwriting", fantasy;
            }
            .sidebar-icons {
            font-size: 24px; 
            gap: 0px;
            color: darkslateblue; 
        }
            .search-box {
                gap: 0px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .mySlides {
            height: 50%; 
        }
        .post-section {
            width: 65%;
            gap: 0px;
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            margin : 0px;
        }
       
        .chat-box {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        </style>
        <link rel="stylesheet" href="stylepro.css">

    </head>
    <body style="background-color:darkslateblue">
        <div>
            <div class="sidebar bar-block border-right large" id="mySidebar" >
                <div class="font">
                   <img src="logo.jpg" width="200" height="200">
                </div>
                <ul>
                    <li><a class="bar-item button active large" href="Pro.php" ><i class="fa fa-home sidebar-icons"></i><b>Home</b></a></li><br>
                    <li><a class="bar-item button active large" href="#friends" ><i class="fa fa-link sidebar-icons"></i><b>Friends</b></a></li><br>
                    <li><a class="bar-item button active large" href="pp.html" target="_blank" ><i class="fa fa-user sidebar-icons"></i><b>Profile</b></a></li><br>
                    <li><a class="bar-item button active large" href="#post" ><i class="fa fa-plus sidebar-icons"></i> <b>Post</b></a></li><br>
                    <li><a class="bar-item button active large" href="#settings" ><i class="fa fa-cog sidebar-icons"></i><b>Settings</b></a></li><br>
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
        </div>
        <center>
            
        <form action="post.php"
           method="post"
           enctype="multipart/form-data">
                           <div class="post">
                <input type="text" placeholder="write something..... " name="post" id="post"/>
                <input type="file" 
                  name="my_image">
          <br>
          <br>
          
           <input type="submit" 
                  name="submit"
                  value="Upload">
                 <br>
                 <br>
                 
    </form>
        
       
    </body>
    
    <?php
    
    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {  
        $post = $_POST['post'];
        $user=$_SESSION['user'];
        $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
 
	if ($error === 0) {
		
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
        
$con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");             
            $y = "Insert into posts(data, username,image_url) values('$post', '$user','$new_img_name')";
            $z = mysqli_query($con, $y);
            if ($z) {
                echo "posted";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }}}
        mysqli_close($con);
    
    ?>
</html>