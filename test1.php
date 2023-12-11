<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusLink - Let's connect</title>
    <link rel="stylesheet" href="homepage.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
        <div class="nav_left">
            <h2 class="logo">CampusLink</h2>
            
        </div>
        
        <div class="nav_right">
    <div class="search-box">
        <form method="post">
            <img src="search.png">
            <input type="text" name="search">
            <button type="submit" name="search_button" style="background: transparent; border: none; padding: 10px;">Submit</button>
        </form>
        <?php
        if (isset($_POST['search_button'])) {
            $search = $_POST['search'];
            $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            } else {
                $sql = "SELECT * FROM campuslink WHERE username REGEXP '^$search';";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="user_profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a>';
                    }
                } else {
                    echo "0 records";
                }
            }
        }
        ?>
    </div>
</div>

            <div class="nav-user-icon online">
                <a href="pp.php" ><img src="images/profile-pic.png" ></a>
            </div>
        </div>

    </nav>

    <div class="container">
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="https://snpawan1107.000webhostapp.com/chat/login.php"><i class="uil uil-newspaper"></i>chat</a>
                <a href="#"><i class="uil uil-users-alt"></i>Friends</a>
                <a href="#"><i class="uil uil-users-alt"></i>Group</a>
                 <a href="an_up.php"><i class="uil uil-megaphone"></i>announcements</a>
                <a href="pr.php"><i class="uil uil-play-circle"></i>post</a>
                <a href="logout.php"><i class="uil uil-signout"></i>Logout</a>
                <a href="#">See More</a>
    
            </div>
            <div class="shortcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="shortcut-1.png">Web Developers</a>
                <a href="#"><img src="shortcut-2.png">Web Developers</a>
                <a href="#"><img src="shortcut-3.png">Web Developers</a>
                <a href="#"><img src="shortcut-4.png">Web Developers</a>

            </div>
        </div>
        
        <div class="main-content">
            
            
            <div class="write-post-container" >
                <div class="post-input-container" style="padding-left:55px;padding-top:20px;width:100%; background: #fff; border-radius:6px; padding:20px; color:#626262; margin:20px 0;">
                <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea style="width:100%;border:0;outline:0;border-bottom:1px solid #ccc;background:transparent;resize:none;" rows="3" placeholder="What's on your mind?" name="post" id="post"></textarea>
                        
                <input type="file" name="my_image" id="fileInput" style="display: none;">
                <label for="fileInput" id="customButton">
                <img src="photo.png" alt="Choose an Image">
                </label>
                        <input type="submit" name="submit" value="Upload" style="background-color:#B56BFF;color:white;border-radius:10px;width:50px;border: 0 solid white;padding:2px;margin-left:450px;">
                    
                </form>
            </div>
                <div class="user-profile">
                    <div>
                        <?php
           $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");

            $sql = "SELECT * FROM posts ORDER BY post_id DESC";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($posts = mysqli_fetch_assoc($res)) {
                    echo '<div class="post" style="width:100%; background: #fff; border-radius:6px; padding:20px; color:#626262; margin:20px 0;">';
                    echo '<div style="display=flex; align-items:center;">';
                    echo '<div style="margin-bottom:5px;font-weight:500;color:#626262">' . $posts['username'] . '</div>';
                    
                    echo '<div style="flex-shrink: 0; margin-right: 10px;">';
                    
                    echo '</div>';
                    echo '<div style="color:#9a9a9a; margin:15px 0;font-size:15px;">' . $posts['data'] . '</div>';
                    echo '</div>';
                    echo '<img src="uploads/' . $posts['image_url'] . '" alt="Result Image" style="width:100%;border-radius:4px";margin-bottom:5px;>';
                    
                    echo '<div style="flex-shrink: 0; display: flex; align-items: center">';
                    echo '';
                    echo '<div class="social-icons" style="display: flex; align-items: center; justify-content: space-between; color: pink;">';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-thumbs-up"></i></a>';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-comments-alt"></i></a>';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-share"></i></a>';
                    echo '</div>';
                    echo '<div style="margin-left:180px;margin-top:5px;font-size:13px;color:#9a9a9a;">'.$posts['time'].'</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <div class="right-sidebar">
            <div class="sidebar-title">
                <h4>Events</h4>
                <a href="#">See All</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p><i class="uil uil-map-pin-alt"></i>Visakhapatnam</p>
                    <a href="#">More Info</a>
                </div>

            </div>
            <div class="event">
                <div class="left-event">
                    <h3>22</h3>
                    <span>August</span>
                </div>
                <div class="right-event">
                    <h4>Culturals</h4>
                    <p><i class="uil uil-map-pin-alt"></i>Visakhapatnam</p>
                    <a href="#">More Info</a>
                </div>

            </div>
            <div class="sidebar-title">
                <h4>Conversations</h4>
                <a href="#">Hide Chat</a>
            </div>

            <div class="online-list">
                <div class="online">
                    
                </div>
            </div>
        </div>

    </div>
     
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