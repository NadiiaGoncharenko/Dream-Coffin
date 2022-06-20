    <header>
       <style>
        .jumbotronM {
        background-color: darkcyan;
        color: #ffffff;
        }
        </style>
        <div class="jumbotron text-center">
            <br>
            <h4 class="display-5">Rest with dignity</h4>
            
        </div>
    </header>
    <main>
        <?php
        // All PHP-Pages are included using "include"
        $width = 100;
        $height = 100;
        
        ?>

            <!--Section to output the pictures-->
            
            <!--<div class="container-fluid" >--> 
          <div class="container-fluid">
            <div class="row" id="categories">

            </div>
          </div>

          <div class="container-fluid">
            <div class="row" id="products">

            </div>
          </div>

        

    </main>
  <script type="text/javascript">

$(document).ready(function() {
  $.ajax({
    type: "POST",
    url: '../../BackEnd/logic/categories.php',
    success: function(response) {
      var jsonData = JSON.parse(response);
      $output = "";
      jsonData.forEach(function (item, index) {
        $output += "<div class=\"col\"><a href=\"#\" onclick=\"getProducts('" + item[1] + "')\">" + item[1] + "</a></div>";
        console.log(item[1]);
      })
      $("#categories").html($output);
    }

  });
  getProducts("");

})
</script>

  