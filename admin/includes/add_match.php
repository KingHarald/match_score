<?php 

    if (isset($_POST['insert-match'])) {
        
        $team_one =           $_POST['team_one'];
        $team_two =           $_POST['team_two'];
        $date_of_match =      $_POST['date_of_match'];
        $team_one_score =     $_POST['team_one_score'];
        $team_two_score =     $_POST['team_two_score'];
        $match_status  =      $_POST['match_status'];

         $match_image = $_FILES['image']['name'];
         $tmp_image = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_image, "images/$match_image");

        if ($team_one =="" || $team_two =="" || $date_of_match =="" || $team_one_score =="" || $team_two_score =="" || $match_status =="") {
        	echo "**All Feilds Mandatory **";
        }

        else {
            $query = "INSERT INTO matchess(team_one, team_two,  date_of_match, team_one_score, team_two_score, match_status, match_image) VALUES('{$team_one}', '{$team_two}', '{$date_of_match}', '{$team_one_score}', '{$team_two_score}', '{$match_status}', '{$match_image}')";

            $match_entry = mysqli_query($connection,$query);

            if (!$match_entry) {
                die("Query Failed"  . mysqli_error($connection));
            }
            header("Location: match.php");
        }

        }

?>

 <center><h2>Add Match</h2></center> 

<form action="" method="post" enctype="multipart/form-data">

  <div class="">
         <label class="" for="team_one">Team 1:</label>
        <select class="form-control" name="team_one">
         <option value="" style="">Select Team 1</option>

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
         <option value="" style="">Select Team 2</option>

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
        <label for="date_of_match">Date Of match</label>
        <input type="date" style="margin-top: 10px; "name="date_of_match" class="" id="date" placeholder="dd/mm/yyyy" >
    </div>

     <div class="">
        <label for="team_one_score">Team 1 Score</label>
        <input type="text" class="" name="team_one_score">
    </div>

 <div class="">
        <label for="team_two_score">Team 2 Score</label>
        <input type="text" class="" name="team_two_score">
    </div>

    <div class="">
        <label for="match_status">Match Status</label>
        <input type="text" class="" name="match_status" placeholder="Eg- Team 1 is win/draw">
    </div>

     <div class="">
        <label for="match_image">Match Image</label>
        <input type="file" name="image" >
    </div>

    <div class="">
        <input type="submit" class="" name="insert-match" value="Add Match">
    </div>
</form>








