<?php include "db.php"; ?>
<?php include "header.php"?>
 <link rel="stylesheet" href="../css/styles.css"/>
 
<nav>
		<ul>
			<li><a href="../index.php">Home</a></li>
		</ul>
		<ul>
			<li><a href="#">Teams</a></li>
		</ul>
		<ul>
			<li><a href="#">Matches</a></li>
		</ul>
		<ul>
			<li><a href="#">about us</a></li>
		</ul>
		<ul>

			 <?php 
                    if(isset($_SESSION['s_username'])) {
                        if ($_SESSION['s_role']=='admin') {
                            ?>
                            <li>
                                <a href="admin/index.php"><i class="fa fa-fw fa-child"></i>Admin</a>
                            </li>
                    }
                    <?php } } ?> 
                

		   <li><a href="../register.php">Register</a></li>
		       <?php 
                        if (isset($_SESSION['s_username'])) {
                            # code...
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 

                                if(isset($_SESSION['s_username']))
                                echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            
                    <?php    }
                    ?>
                    

                </ul>

		</ul>

	</nav>

	 <!-- Login -->
                <?php

                    if (!isset($_SESSION['s_username'])) {
                        ?>
                            
                            <center>   <h4 style="padding-top: 5%; padding-right: 30%;">Login With Your Username And Password</h4> </center> 
                                <form action="login.php" method="post" style="padding-left: 10%;">

                                     <label for="username">Username:</label>
                                     <input name="username" id="username" type="text" class="" placeholder="Username">

                                       <label for="Password">Password:</label>
                                        <input name="password" type="password" id="Password" class="" placeholder="Password" style="">
                                         
                                        <input type="submit" name="login" value="login">

                                       
                                </form>
                               
                          
                        
                <?php } ?>


                <?php 
 
if (isset($_POST['login']) || isset($_POST['register'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	  $select_user = mysqli_query($connection,$query);

	  if (!$select_user) {
    echo "Unable to Log in Please register";
	}
	else{
		echo ".<h3 style='padding-top: 5%; color: black'>Unable to find your data ! Please Login or Signup";
		?> </h3>
		<h3 style=""></h3>

		 <?php 
	}

	while ($row = mysqli_fetch_assoc($select_user)) {
		$db_user_id = $row['user_id'];
		$db_username = $row['username'];
		$db_user_password = $row['password'];
		$db_user_role = $row['user_role'];
	

		if($username === $db_username && $password === $db_user_password) {

			$_SESSION['s_username'] = $db_username;
			$_SESSION['s_role'] = $db_user_role;
			$_SESSION['s_id'] = $db_user_id;

			if ($db_user_role == 'admin') {
				header("Location: ../admin");
				exit;			
			}
			else if ($db_user_role == 'subscriber') {
				header("Location: ../index.php");
				exit;			
			}
		}
		else {
			header("Location: ../index.php");
			exit;
		}
	}
}

?>