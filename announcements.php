<?php 
                    $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
                    if (isset($_GET['username'])) {
                        $user = $_GET['username'];    
                        $con = mysqli_connect('127.0.0.1', 'root', '', 'pawan'); 
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