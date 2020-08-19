
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation --> 
    <?php include "includes/navigation.php"; ?>

    
	
<img src="images/randombanner.php"/>
	<main class="home">

		 <?php
                    $match_per_page = 3;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'] ;  
                    }
                    else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    }
                    else {
                        $page_1 = ($page * $match_per_page) - $match_per_page;
                    }

                    $query = "SELECT *  FROM  matchess ";
                    $match_count = mysqli_query($connection,$query);
                    $count = mysqli_num_rows($match_count);

                    $count = ceil($count / $match_per_page) ; ?>


		<h1>Home Page</h1>

		<p>Welcome to the KickOff League. See how your favourite team is doing and comment on matches.</p>
		<br><br>

		<center><h3>Latest Matches</h3> </center> <br> <br>
		<?php 
         
          $query = "SELECT *  FROM  matchess LIMIT $page_1,$match_per_page";
          $select_match = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_match)) {
                $match_id = $row['match_id'];
                $team_one = $row['team_one'];
                $team_two = $row['team_two'];
                $date_of_match = $row['date_of_match'];
                $team_one_score = $row['team_one_score'];
                $team_two_score = $row['team_two_score'];
                $match_status = $row['match_status'];
                $match_image = $row['match_image'];

  if ($select_match == TRUE) {
     
                                        
  ?>

   <h2 style="padding-top: 5%;">

        <?php echo $team_one . " VS " . $team_two; ?>
                        </h2>
                        
                        <p><span class="glyphicon glyphicon-time"></span> Date Of Match <?php echo $date_of_match; ?></p>
                        <hr>
                        <img width="600" class="img-responsive" src="admin/images/<?php echo $match_image; ?>" alt="">
                        
                       
                       <center><a href="match_info.php?match_id=<?php echo $match_id; ?>"><h3 style="padding-top: 2%; padding-right: 10%;">Match Details</h3> </a>  </center>
                        

                        <hr>
                        <br><br>

      <?php 

  } 

            }

		?>



		 <ul class="">
            <?php
                for ($i=1; $i <= $count; $i++) { 
                    if($i !== $page) {
                        echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                    }
                    else {
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";
                    }
                  
                }

            ?>
        </ul>

			
	</main>


<?php include "includes/footer.php"; ?>