<?php 
include "includes/db.php";

?>







 <div id="Edit Details" class="tabcontent">
        <center> <h3>Edit Details</h3> </center> 
          <br>
          <?php
            

            $curr_user_id = $_SESSION['s_id'];
            $query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
            $select_user = mysqli_query($connection,$query);

          
                                        while($row = mysqli_fetch_assoc($select_user)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $phone_no = $row['phone_no'];
                                            $user_role = $row['user_role'];
                                            $password = $row['password'];
                                          
            }

            if (isset($_POST['update-user'])) {
              $username = $_POST['username'];
              $email = $_POST['email'];
              $phone_no = $_POST['phone_no'];
              $password = $_POST['password'];
             

              $query = "UPDATE users SET username='{$username}', email='{$email}', phone_no='{$phone_no}', password='{$password}' WHERE user_id=$curr_user_id";
             
              
              $update_user = mysqli_query($connection,$query);

              if (!$update_user) {
                die("Query Failed" . mysqli_error($connection));
              }
              header("Location:profile.php");
            }

            ?>

             <form action="" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="username">Username</label>
                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
              </div>

               <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $email; ?>" type="text" class="form-control" name="email">
              </div>

               <div class="form-group">
                <label for="phone_no">Phone no</label>
                <input value="<?php echo $phone_no; ?>" type="text" class="form-control" name="phone_no">
              </div>

               <div class="form-group">
                <label for="password">Password</label>
                <input value="<?php echo $password; ?>" type="text" class="form-control" name="password">
              </div>


                <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update-user" value="Update">
              </div>
            </form>

         


    



