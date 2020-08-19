<?php 
include "includes/db.php";
include "includes/header.php";
?>

<?php 


// navigation //
include "includes/navigation.php"; ?>

<center><h1>Welcome To Your Profile</h1></center>

 <?php 

  $curr_user_id = $_SESSION['s_id'];

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_user':
                                include "includes/add_user.php";
                                break;
                            
                            case 'edit_user':
                                include "includes/edit_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>user id</th>
                                        <th>Your Username</th>
                                        <th>Your Email</th>
                                        <th>Your Phone No</th>
                                        <th>Your Role</th>
                                        <th>Your Password</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users where user_id = $curr_user_id";
                                        $select_user = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_user)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $phone_no = $row['phone_no'];
                                            $user_role = $row['user_role'];
                                            $password = $row['password'];
                                          
                                           
                                           
                                        if ($select_user == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone_no ?></td>
                                        <td><?php echo $user_role ?></td>
                                        <td><?php echo $password ?></td>
                              <?php echo "<td><a href='profile.php?source=edit_user&user_id=$user_id'>Edit</a></td>"; ?>
                        
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>

                       
