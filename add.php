<?php
session_start();
include "init.php";
include "header.php";
include "navbar.php";	

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone     = $_POST['phone'];
		$part = $_POST['part'];

		$stmt = $con->prepare("INSERT INTO `contacts` 
		(firstname, lastname, phone ,part)
			VALUES(:firstname ,:lastname, :phone ,:part)");

		$stmt->execute(array(
			'firstname'=> $firstname ,
			'lastname'=> $lastname ,
			'phone'   => $phone,
			'part'    => $part
		));

		$_SESSION['email'] = $email;
		 header('Location: view.php');
	}

?>

<!-- start register area -->
<div class="container">
	<div class="title text-center">
		<h1>Add contacts</h1>
	</div>
	<div class="add">
		<form action="add.php" method="POST">
		  <div class="form-group">
		    <label for="firstname">FirstName</label>
		    <input type="text" class="form-control" id="firstname" name="firstname">
		     <label for="lastname">lastName</label>
		    <input type="text" class="form-control" id="lastname" name="lastname">
		  </div>


		  <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="number" class="form-control" id="phone" name="phone">
		  </div>
		  <!-- <div class="form-group">
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

		  <button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>

</div>
<!-- end register area -->