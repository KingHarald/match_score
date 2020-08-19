<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation --> 
    <?php include "includes/navigation.php"; ?>
	
<img src="images/randombanner.php"/>
	<main class="home">
<hr />

		<h1>List Of Matches</h1> <br> <br>


		<table class="teams">

			 <table class="teams">

                                <thead>
                                    <tr>
                                        <th>Team 1</th>
                                        <th>Score</th>
                                        <th>Team 2</th>
                                        <th>Score</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>

		<?php  $query = "SELECT *  FROM  matchess ";
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


                          echo "<tr>";
                                         echo "<td> {$team_one} </td>";
                                         echo "<td> {$team_one_score} </td>";
                                         echo  "<td> {$team_two} </td>";
                                         echo  "<td> {$team_two_score} </td>"; ?>
                                       <td> <a href="match_info.php?match_id=<?php echo $match_id; ?>" style="padding-top: 2%; padding-right: 10%;">Full Details </a> </td>  
                                        <?php  

                                       


                    }

                        ?>

                          </tbody>
                            </table>


		

		<hr />

		<?php include "includes/footer.php"; ?>