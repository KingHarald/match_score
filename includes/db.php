<?php
$connection = mysqli_connect("localhost",'root','','football');

if (!$connection) {
	die('unable to connection'. mysqly_error('$connection')); // checking database connection // 
}

?>