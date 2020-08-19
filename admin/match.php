<?php 
include "../includes/db.php";
include"includes/header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/navigation.php"; ?>

       
                    <center>   <h1 class="page-header">
                            Welcone To Admin
                            <small>Author</small> </center> 
                        </h1> <br><br>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_match':
                                include "includes/add_match.php";
                                break;
                            
                            case 'edit_match':
                                include "includes/edit_match.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>match id</th>
                                        <th>Team One</th>
                                        <th>Team Two</th>
                                        <th>date_of_match</th>
                                        <th>Team One Score</th>
                                        <th>Team Two Score</th>
                                        <th>Match Status</th>
                                        <th>Match Image</th>
                                        <th>Options</th>
                                    </tr>
                                       
                                       
                                       
                                       
                                       
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  matchess";
                                        $select_match = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_match)) {
                                            $match_id = $row['match_id'];
                                            $team_one = $row['team_one'];
                                            $team_two = $row['team_two'];
                                            $date_of_match = $row['date_of_match'];
                                            $team_one_score = $row['team_one_score'];
                                            $team_two_score = $row['team_two_score'];
                                            $match_status = $row['match_status'];
                                            $match_image = $row['match_image'];
                                           
                                           
                                        if ($select_match == TRUE) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $match_id ?></td>
                                        <td><?php echo $team_one ?></td>
                                        <td><?php echo $team_two ?></td>
                                        <td><?php echo $date_of_match ?></td>
                                        <td><?php echo $team_one_score ?></td>
                                        <td><?php echo $team_two_score ?></td>
                                        <td><?php echo $match_status ?></td>
                                        <td><img width="100" src="images/<?php echo $match_image ?>"></td>
                                        <?php echo "<td><a href='match.php?delete=$match_id'>Delete</a>"; ?>
                                        <?php echo "<a href='match.php?source=edit_match&match_id=$match_id'>Edit</a>"; ?>
                        
                                    </tr>
                                    <?php } }?>


                                </tbody>
                                </table><?php
                                break;
                        }
                       
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $match_idd = $_GET['delete'];
                            // echo "$match_idd";
                            $query = "DELETE FROM matchess WHERE match_id = {$match_idd} ";

                            $delete_match = mysqli_query($connection,$query);
                            if(!$delete_match) {
                                die("Query Failed" . mysqli_error($delete_match));
                            }
                            header("Location: match.php");
                        }

                        ?>

