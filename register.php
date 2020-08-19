<?php 
include "includes/db.php";
include "includes/header.php";
?>

<?php 


// navigation //
include "includes/navigation.php";

if (isset($_POST['register'])) {
  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];


if ($username=="" || $email=="" || $phone_no=="" || $password=="") {
  # code...
  echo "**ALL FIELDS MANDATORY";
}
elseif (strlen($phone_no)!=10) {
  # code...
  echo "**PhoneNo Must Contain Of 10 bits";
}

else {

$query = "INSERT INTO users(username, email, phone_no, user_role, password) VALUES('$username', '$email', '$phone_no', 'subscriber', '$password') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: includes/login.php"); 

}

}

?>


  
                
              
              <form action="" method="post" enctype="multipart/form-data">
                
               
                  <label for="email" style="">Username:</label>
                  <input type="text" class="" id="" placeholder="Enter Username" name="username">
               

                
                  <label for="email">Email:</label>
                  <input type="email" class="" id="email" placeholder="Enter email" name="email">
              
                
               
                  <label for="pwd">Phone No:</label>
                  <input type="text" class="" id="pwd" placeholder="Enter PhoneNo" name="phone_no">
             

               
                  <label for="pwd">Password:</label>
                  <input type="password" class="" id="pwd" placeholder="Enter password" name="password">
                 <input type="submit" name="register" value="register">
              </form>
            