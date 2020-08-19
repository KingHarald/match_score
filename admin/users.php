<?php 
include "../includes/db.php";
include"includes/header.php"; ?>

   
        
        <!-- Navigation -->
        <?php include"includes/navigation.php"; ?>

        

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcone Admin
                        
                        </h1>


                         <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'edit_user':
                                include "includes/edit_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>user_role</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $user_role = $row['user_role'];
                                            $phone_no = $row['phone_no'];  
                                                                                 

                                     ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone_no ?></td>
                                        <td><?php echo $user_role ?></td>
                                        
                                        <?php echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>"
                                       ; ?>
                                        <?php echo "<td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?make_admin=$user_id'>Make Admin</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?remove_from_admin=$user_id'>Remove From Admin</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $user_idd = $_GET['delete'];
                          
                            $query = "DELETE FROM users WHERE user_id = $user_id ";

                            $delete_query = mysqli_query($connection,$query);
                            
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location : users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['make_admin'])) {
                            $user_id = $_GET['make_admin'];
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>

                        <?php 

                        if (isset($_GET['remove_from_admin'])) {
                            $user_id = $_GET['remove_from_admin'];
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";
                            
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>



