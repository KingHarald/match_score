<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation --> 
    <?php include "includes/navigation.php"; ?>
	
<img src="images/randombanner.php"/>
	<main class="home">


<h1>List Of All The Teams</h1>

		<table class="teams">

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


                           
                            $query = "SELECT *  FROM  teams";
                            $view_teams = mysqli_query($connection,$query);
                           
                                        while($row = mysqli_fetch_assoc($view_teams)) {
                                        $team_id = $row['team_id'];
                                        $team_names = $row['team_names'];
                                        $points      = $row['points'];

                                        echo "<tr>";
                                        echo "<td> {$team_id} </td>";
                                        echo "<td> {$team_names} </td>";
                                        echo  "<td> {$points} </td>";
                                       
                                    }

                                    ?>
                                </tbody>
                            </table>


		<hr />

        <?php include "includes/footer.php"; ?>