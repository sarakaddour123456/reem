<body>
	<div class="addr">
	<h1> Address book </h1>
	</div>
<!-- start navbar -->
	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	       <?php if (isset($_SESSION['email'])) { ?>
	      
	      <a class="navbar-brand" href="add.php"> Add contact</a>
	    <?php } ?>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li class="dropdown">
	     <?php if (isset($_SESSION['email'])) { ?>
	          <a href="view.php">review all contact</a>
	        </li>
	        <li><a href="edit.php">Edit contact</a></li>
	        <li><a href="edit.php">Delete contact</a></li>
	        
	        <?php } ?>
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	      	 
	      	<?php if (!isset($_SESSION['email'])) { ?>
	        <li><a href="sign.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	        
	         <?php } else{ ?>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>	      
	     <?php } ?>
	      </ul>
	    </div>
	  </div>
	</nav>
<!-- end navbar -->