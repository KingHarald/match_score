<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation --> 
    <?php include "includes/navigation.php"; ?>
	
<img src="images/randombanner.php"/>
	<main class="home">
<hr />

		<h1>Match Info</h1> <br> <br>

		 <?php 
                  

                    if(isset($_GET['match_id'])) {
                        $selected_match = $_GET['match_id'];
                    } 
                 
                 $query = "SELECT *  FROM  matchess WHERE match_id = $selected_match ";
                 $select_all_match_query = mysqli_query($connection,$query);

                  while($row = mysqli_fetch_assoc($select_all_match_query)) {
                        $match_id = $row['match_id'];
                        $team_one = $row['team_one'];
                        $team_two = $row['team_two'];
                        $date_of_match = $row['date_of_match'];
                        $team_one_score = $row['team_one_score'];
                        $team_two_score = $row['team_two_score'];
                        $match_status = $row['match_status'];
                        $match_image = $row['match_image'];

                        ?>
     <h2 style="padding-top: 5%;">

        <?php echo $team_one . " VS " . $team_two; ?>  </h2>
         <p style="color: #127819;"><span class="glyphicon glyphicon-time"></span> Date Of Match <?php echo $date_of_match; ?></p>
                        <hr>
        <img width="600" class="img-responsive" src="admin/images/<?php echo $match_image; ?>" alt=""> <br>

        <h4>Match Score</h4> <br>
      <h3 style="color: #3e58bd"><?php echo  $team_one . " - " . $team_one_score  ?></h3> <br>
      <h3 style="color: #bd553e"><?php echo  $team_two . " - " . $team_two_score; ?></h3> <br>
      <h4>Match Result</h4> <br>
      <h3 style="color: #d91111;"><?php echo $match_status; ?></h3>

                       
                         <?php 


                    }

                    ?>
                       <br>
                        <?php  if (!isset($_SESSION['s_role'])) { ?>
                   <h5> <li><a href="includes/login.php">Login To  Add Comment</a></li></h5>

                 <?php } ?>

                  <?php 
                        if (isset($_SESSION['s_username'])) {
                            
                            ?> 

                            <h5>Add Comments</h5>
                            </div>
                            <form method="post">
                 <textarea class="" name="comments" cols="30" rows="10"></textarea>
        <input style="padding-bottom: ; padding-left: : 10%;" type="submit" class="" name="post_comment" value="Post">
    
</form>
<div>

    <?php } ?>

    <hr>
    
                      

              



		
		