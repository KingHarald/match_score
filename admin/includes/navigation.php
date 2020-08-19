<nav>
		<ul>
			<li><a href="index.php">Dashboard</a></li>
		</ul>
		<ul>
			<li><a href="../index">Home</a></li>
		</ul>
		<ul>
			 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i>matches <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                 <a href="match.php?source=add_match">Add Match</a>
                            </li>
                            <li>
                                 <a href="match.php">View All Match</a>
                            </li>
                            
                        </ul>
                    </li>
                   
             	
             </ul>
				
		</ul>
		<ul>
			<li><a href="teams.php">Teams</a></li>
		</ul>
		<ul>
			<li><a href="users.php">All Users</a></li>
		</ul>
		<ul>

			 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Welcome " .  ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    

                </ul>

		

	</nav>