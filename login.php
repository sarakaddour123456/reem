<?php
session_start();
include"init.php";
include"header.php";
include"navbar.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $newPassword = sha1($password);


    $stmt = $con->prepare("SELECT * FROM signs WHERE email = ? AND password = ?");

    $stmt->execute(array($email,$newPassword));
    $count = $stmt->rowCount();
    if ($count > 0) {
      $user = $stmt->fetch();
      $_SESSION['email'] = $user['email'];
      $_SESSION['id'] = $user['id'];
      header('Location: add.php');
    } else {
      echo "somthig wrong baby ^_^ ";
    }

  }

?>
<!-- start login area -->
<div class="container">
  <div class="title text-center">
    <h1>Login</h1>
  </div>
  <div class="login">
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

</div>
<!-- end login area -->

<?php
include"footer.php";
?>