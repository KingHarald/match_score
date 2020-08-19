<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
		</ul>
		<ul>
			<li><a href="team_list.php">All Teams</a></li>
		</ul>
		<ul>
			<li><a href="match_list.php">All Matches</a></li>
		</ul>
		<ul>
			<li><a href="#">About Us</a></li>
		</ul>
		<ul>

			 <?php 
                    if(isset($_SESSION['s_username'])) {
                        if ($_SESSION['s_role']=='admin') {
                            ?>
                            <li>
                                <a href="admin/index.php"><i class="fa fa-fw fa-child"></i>Administration</a>
                            </li>
                    }
                    <?php } } ?> 
                 <?php  if (!isset($_SESSION['s_role'])) { ?>
            <li><a href="includes/login.php">Login</a></li>
		   <li><a href="register.php">Register</a></li>
		      <?php  } ?>

		        <?php 
                        if (isset($_SESSION['s_username'])) {
                           
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 

                                if(isset($_SESSION['s_username']))
                                echo "Welcome " . ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"> Profile</a>
                                    </li>
                                    <li class=""></li>
                                    <li>
                                        <a href="includes/logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            
                    <?php  }  ?>
                   
                    

                </ul>

		

	</nav>