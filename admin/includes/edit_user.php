
<?php

if (isset($_GET['user_id'])) {
	$edit_user_id = $_GET['user_id'];
}

$query = "SELECT *  FROM  users WHERE user_id=$edit_user_id";
$select_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $user_id = $row['user_id'];
    $email = $row['email'];
    $username = $row['username'];
    $phone_no = $row['phone_no'];
    $user_role = $row['user_role'];
}

if (isset($_POST['edit-user'])) {
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];

	

	$query = "UPDATE users SET username = '$username', email = '$email' , phone_no='$phone_no' WHERE user_id=$edit_user_id ";
	
	$update_user_detail = mysqli_query($connection,$query);

	if (!$update_user_detail) {
		die("Query Failed" . mysqli_error($connection));
	}

	header("location: users.php ");

}

?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="username">Edit Username</label>
		<input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="email">Edit Email</label>
		<input value="<?php echo $email; ?>" type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label for="phone_no">Edit Phone No</label>
		<input value="<?php echo $phone_no; ?>" type="text" class="form-control" name="phone_no">
	</div>

   <div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit-user" value="Update">
	</div>
</form>
