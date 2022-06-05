<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }    
?>
<div class="container-flex">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #98c0dd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/imprint.php">Imprint</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/helpsite.php">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/warenkorb.php">Warenkorb</a>
                </li>
                <?php if(!isset($_SESSION["userID"])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/registration_form.php">Registration</a>
                </li>
                
            
                <?php endif ?>

            
                <?php   #admin =1      # Different Menu for different roleID
                // $_SESSION["roleID"] = 1; #simulation without DB
                
                if(isset($_SESSION["roleID"]) && $_SESSION["roleID"] == 1 ): ?> 
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User Administration
                        </a>
                        <div class="dropdown-menu" style="background-color: #c2d3df;" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/user/updateProfile.php">Users Profiles</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products and orders
                        </a>
                        <div class="dropdown-menu" style="background-color: #c2d3df;" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/products/edit_products.php">Edit products</a>
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/products/all_products.php">All products</a>
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/invoices/invoices.php">All invoices</a>
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/invoices/invoice_detail.php">Invoice</a>
                        </div>
                    </li>
                
              
                <?php  #user =3
                elseif(isset($_SESSION["roleID"]) && $_SESSION["roleID"] == 3 ): ?>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Cabinet
                        </a>
                        <div class="dropdown-menu" style="background-color: #c2d3df;" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/user/editData.php?userID=<?php echo $_SESSION["userID"];?>">Edit Profile</a>
                           <!-- //userID übergabe aus DB -->
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/user/all_orders_user.php?userID=<?php echo $_SESSION["userID"];?>">Your Orders</a>
                            <a class="dropdown-item" href="http://localhost/Dream-Coffin/FrontEnd/pages/user/all_invoices_user.php?userID=<?php echo $_SESSION["userID"];?>">Your Invoices</a>
                                                       
                        </div>
                    </li>

                <?php endif ?> 

                <!-- <//?php if(isset($_SESSION["userID"])):?> --> 
                    <!-- напевне так краще -->
                <?php if(isset($_SESSION["userID"])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/login.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dream-Coffin/FrontEnd/pages/login.php">Login</a>
                    </li>
                <?php endif ?> 

                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="search"  title="Type in a category name="search">
                    
                </div> -->
                <form>
                  <!--   <input type="text" size="30" autocomplete="off" placeholder="Search..." onchange="this.value">
                     <div id="search"></div> -->
                    
                
                    <div class="search-box">
                        <input type="text" size="30" autocomplete="off" placeholder="Search ..." />
                        <div class="result"></div>
                    </div>
                </form>
            </ul>
        </div>
    </nav>
</div>
<!-- <script>
	showResult(); //für Suche
</script> -->


