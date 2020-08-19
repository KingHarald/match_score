<?php

if (isset($_GET['match_id'])) {
	$edit_match_id = $_GET['match_id'];
}

$query = "SELECT *  FROM  matchess WHERE match_id=$edit_match_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
        $team_one =         $row['team_one'];
        $team_two =         $row['team_two'];
        $date_of_match =     $row['date_of_match'];
        $team_one_score =    $row['team_one_score'];
        $team_two_score  =   $row['team_two_score'];
        $match_status =      $row['match_status'];
        $match_image =       $row['match_image'];

if (isset($_POST['edit_match'])) {
	
	$team_one =       $_POST['team_one'];
	$team_two =       $_POST['team_two'];
	$date_of_match =      $_POST['date_of_match'];
    $team_one_score =             $_POST['team_one_score'];
    $team_two_score  =         $_POST['team_two_score'];
    $match_status =    $_POST['match_status'];

      $match_image = $_FILES['image']['name'];
         $tmp_image = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$match_image");

  
	

	$query = "UPDATE matchess SET team_one='{$team_one}', team_two='{$team_two}', date_of_match='{$date_of_match}', team_one_score='{$team_one_score}', team_two_score='{$team_two_score}', match_status='{$match_status}', match_image='{$match_image}' WHERE match_id=$edit_match_id ";
	
	
	
	$update_match = mysqli_query($connection,$query);

	if (!$update_match) {
		die("Query Failed" . mysqli_error($connection));
	}

	 header("Location: match.php");

}
}

?>

 <center><h2>Edit Match</h2></center> 
<form action="" method="post" enctype="multipart/form-data">


 <div class="">
         <label class="" for="team_one">Team 1:</label>
        <select class="form-control" name="team_one">
         <option value="<?php echo $team_one ?>" style=""><?php echo $team_one; ?></option>

                 <?php 

               $query = "SELECT * FROM teams ";
              $select_team = mysqli_query($connection,$query);

              if (!$select_team) {
                die("Query Failed" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($select_team)) {
                $team_names = $row['team_names'];
            
                echo "<option value='$team_names'>$team_names</option>";

            }

            ?> 
             </select>
            </div>
 
   <div class="">
         <label class="" for="team_two">Team 2:</label>
        <select class="form-control" name="team_two">
         <option value="<?php echo $team_two ?>" style=""><?php echo $team_two ?></option>

                 <?php 

               $query = "SELECT * FROM teams ";
              $select_team = mysqli_query($connection,$query);

              if (!$select_team) {
                die("Query Failed" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($select_team)) {
                $team_names = $row['team_names'];
            
                echo "<option value='$team_names'>$team_names</option>";

            }

            ?> 
             </select>
            </div>

    
 <div class="">
        <label for="date_of_match">Change Date Of match</label>
        <input value="<?php echo $date_of_match; ?>" type="date" style="margin-top: 10px; "name="date_of_match" class="" id="date" placeholder="dd/mm/yyyy" >
    </div>

     <div class="">
        <label for="team_one_score">Edit Team 1 Score</label>
        <input value="<?php echo $team_one_score; ?>" type="text" class="" name="team_one_score">
    </div>

 <div class="">
        <label for="team_two_score">Edit Team 2 Score</label>
        <input value="<?php echo $team_two_score; ?> " type="text" class="" name="team_two_score">
    </div>

    <div class="">
        <label for="match_status">Edit Match Status</label>
        <input value="<?php echo $match_status ?>" type="text" class="" name="match_status" >
    </div>
<div class="">
        <label for="match_image">upload Match Image</label>
        <input type="file" name="image" >
    </div>


    <div class="">
        <input type="submit" class="" name="edit_match" value="Edit Match">
    </div>
</form>



