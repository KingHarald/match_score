<?php 
include "../includes/db.php";
include"includes/header.php"; ?>

   
        
        <!-- Navigation -->
        <?php include"includes/navigation.php"; ?>

        
                     <center>  <h1 class="page-header">
                            Welcone To Admin
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1> </center> 
                        <br> <br> <br>

                      <?php
                       if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'edit_teams':
                                include "includes/edit_teams.php";
                                break;

            default: 


                       ?>

                   <center>  <h3>Add Teams</h3>  </center>   

                        

                            <?php

                                if (isset($_GET['delete'])) {
                                    $team_del_id = $_GET['delete'];

                                    $query = "DELETE FROM teams WHERE team_id=$team_del_id";

                                    $delete_team = mysqli_query($connection,$query);

                                }

                            ?>


                             <?php 
                            if(isset($_POST['submit'])) {

                                $team_names = $_POST['team_names'];
                                $points =     $_POST['points'];
                                if($team_names=="" || empty($team_names)) {
                                    echo " This Field Must Not be Empty";
                                }

                                $query = "INSERT INTO teams(team_names, points) VALUE ('$team_names', '$points')";
                                $create_team = mysqli_query($connection,$query);

                                if(!$create_team) {
                                    die("Query Failed");
                                }
                            }
                            ?>

                             <form action="" method="post" style="padding-left: 30%;">
                                <div class="form-group">
                                    <label for="team_names">Team Name:</label>
                                    <input class="" type="text" name="team_names">
                                </div>
                                <div class="form-group">
                                    <label for="points">Points:</label>
                                    <input class="" type="text" name="points">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Team">
                                </div> 
                            </form>
                            <br>
                        </div>
<br> <br>

                       

                            <?php 
                            $query = "SELECT *  FROM  teams";
                            $select_categories = mysqli_query($connection,$query);
                            ?>

                           
<div style="padding-top: 10%;">

	         <center> <h3>List Of Teams</h3> </center> 
                            <table class="teams">

                                <thead>
                                    <tr>
                                        <th>Team ID</th>
                                        <th>Team Names</th>
                                        <th>Points</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php  
                                        while($row = mysqli_fetch_assoc($select_categories)) {
                                        $team_id = $row['team_id'];
                                        $team_names = $row['team_names'];
                                        $points      = $row['points'];

                                        echo "<tr>";
                                        echo "<td> {$team_id} </td>";
                                        echo "<td> {$team_names} </td>";
                                        echo  "<td> {$points} </td>";
                                        echo "<td> <a href ='teams.php?source=edit_teams&team_id=$team_id'>Edit </a></td>";
                                        echo "<td><a href='teams.php?delete=$team_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table> <?php } ?>

                      </div>

