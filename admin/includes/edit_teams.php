<?php

if (isset($_GET['team_id'])) {
	$edit_team_id = $_GET['team_id'];
}

$query = "SELECT *  FROM  teams WHERE team_id=$edit_team_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $team_id = $row['team_id'];
    $team_names = $row['team_names'];
    $points     = $row['points'];
    }

if (isset($_POST['edit-team'])) {
	
	$team_names = $_POST['team_names'];
	$points     = $_POST['points'];

	$query = "UPDATE teams SET team_names = '$team_names', points = '$points' WHERE team_id = $edit_team_id";

	$update_team_detail = mysqli_query($connection,$query);

	if (!$update_team_detail) {
		die("Query Failed" . mysqli_error($connection));
	}

	header("location: teams.php ");

}

?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="team_names">Edit Team name</label>
		<input value="<?php echo $team_names; ?>" type="text" class="" name="team_names">
	</div>

	<div class="form-group">
		<label for="points">Edit Points</label>
		<input value="<?php echo $points; ?>" type="text" class="" name="points">
	</div>
<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit-team" value="Update">
	</div>
</form>

