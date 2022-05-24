<?php
    include '../../webstructure/head.php';
    
  $emailErr=$fnameErr=$lnameErr= "";
  $email=$salutation=$fname=$lname=$username=$usertype= "";
?>

    <title>Update your profile</title>
</head>
<body>
  <?php
    include '../../webstructure/menuleiste.php';
  ?>

  <br>
  <div class="container text-center">
     <h1 id = "heading-1">Update profile </h1>
  </div>
  <br>


  <div class=container>
    <div class="sickbg container jumbotron">
      <form name="kiki" action="#" method="post"> 
      
        <div class="form-group col-md-4">
          <label for="salutation">Salutation</label>
          <select autocomplete="off" id="salutation" name="salutation" class="form-control" value="<?php echo $salutation;?>">
            <!--shows current salutation -->
            <option  <?php if ($salutation=="Mrs.") {echo "selected"; }?>>Mrs.</option>
            <option  <?php if ($salutation=="Ms.") {echo "selected"; }?>>Ms.</option>
            <option  <?php if ($salutation=="Mr.") {echo "selected"; }?>>Mr.</option>
            
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="fname">First name:</label>
          <span class="error">* <?php echo $fnameErr;?></span>
          <input  class="form-control" name="fname" type="text" id="fname" placeholder="First name"  value="<?php echo $fname; ?>" required/>
      
          <input type="hidden" value= "<?php echo $userID ; ?>" name="userID"></input>
        </div>

        <div class="form-group col-md-6">
          <label for="lname">Lastname:</label>
          <span class="error">* <?php echo $lnameErr;?></span>
          <input  class="form-control" name="lname" type="text" id="lname" placeholder="Last name" value="<?php echo $lname; ?>" required/>
          
          <input type="hidden" value= "<?php echo $userID ; ?>" name="userID"></input>
        </div>

        <div class="form-group col-md-6">
          <label for="email">E-Mail-Address:</label>
          <span class="error">* <?php echo $emailErr;?></span>
          <input  class="form-control" name="email" type="email" id="email" placeholder="E-Mail-Adresse" value="<?php echo $email; ?>" required/>
      
          <input type="hidden" value= "<?php echo $userID ; ?>" name="userID"></input>
        </div> 


        <button type='submit' name='submit' class='btn btn-primary' value="id"> Update </button><br><br>
      </form>
      <br>
      <?php if(isset($_SESSION["userrole"]) && $_SESSION["userrole"] == 1): ?>
      <a class="btn btn-info" href="user_table.php">Go back</a>
      <?php endif;?>
    </div> 
  </div>
  
  <?php include "../../webstructure/footer.php";
  ?>