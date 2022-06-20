
$(document).ready(function() {
    $.ajax({
      type: "POST",
      url: 'http://localhost/Dream-Coffin/BackEnd/logic/categories.php',
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