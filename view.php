<?php
session_start();
include"init.php";
include"header.php";
include"navbar.php";



  $stmt = $con->prepare("SELECT * FROM contacts");
  $stmt->execute(array());
  $contacts = $stmt->fetchAll();

  
?>
<!-- start table -->
<div class="container">
  <h2 class=" text-center">contacts</h2> 
  <div>         
  <table class=" table table-dark table-hover" method="GET">
    <thead>
      <tr>
      	
        <th>Firstname</th>
        <th>Lastname</th>
        <th>phone</th>
        <th>part</th>
      </tr>
    </thead>
    <tbody>
      <div class="cont">
      <?php foreach($contacts as $cont){ ?> 
        
      <tr>
        <td> <?php echo $cont['firstname'] ; ?> </td>
        <td> <?php echo $cont['lastname'] ; ?> </td>
        <td> <?php echo $cont['phone'] ; ?> </td>
        <td> <?php echo $cont['part'] ; ?> </td>
      </tr> 

      </div>
    <?php }?>
    </tbody>
  </table>
  </div> 
</div>
<!-- end table -->

<?php
include"footer.php";
?>