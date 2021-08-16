<?php
session_start();
include "init.php";
include "header.php";
include "navbar.php";	

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email     = $_POST['email'];
		$password  = $_POST['password'];
		$newPassword = sha1($password);
		$part = $_POST['part'];

		$stmt = $con->prepare("INSERT INTO `signs` 
		(firstname, lastname, password , email ,part)
			VALUES(:firstname ,:lastname, :password , :email ,:part)");

		$stmt->execute(array(
			'firstname'=> $firstname ,
			'lastname'=> $lastname ,
			'password' => $newPassword ,
			'email'    => $email,
			'part'=> $part
		));

		$_SESSION['email'] = $email;
		 header('Location: index.php');
	}

?>

<!-- start register area -->
<div class="container">
	<div class="title text-center">
		<h1>sign up</h1>
	</div>
	<div class="sign_up">
		<form action="sign.php" method="POST">
		  <div class="form-group">
		    <label for="firstname">FirstName</label>
		    <input type="text" class="form-control" id="firstname" name="firstname">
		     <label for="lastname">lastName</label>
		    <input type="text" class="form-control" id="lastname" name="lastname">
		  </div>

		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email">
		  </div>

		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" name="password">
		  </div>
		 <!--  <div class="form-group">
		    <label for="part">part</label>
		    <input type="text" class="form-control" id="part" name="part">
		  </div> -->
		  <div class="form-group">

		  	  <label for="part">part</label>
		    <select class="form-control" name="part">
		    	<option>Distribution</option>
		    	<option>Damascus section</option>
		    	<option> Manager</option>
		    </select>
		  </div>

		  <button type="submit" class="btn btn-primary">sign up</button>
		</form>
	</div>

</div>
<!-- end register area -->