

$(document).ready(function() {
    $.ajax({
      type: "POST",
      url: 'http://localhost/Dream-Coffin/BackEnd/logic/orders.php',
      data: {method: 'bestell', status: 'ordered'},
      success: function(response) {
        console.log(response);
        var jsonData = JSON.parse(response);
        $output = "";
        $total = "aaa";
        jsonData.forEach(function (item, index) {
         
          $output += "<div id=\"order-" + item[0] + "\" class=\"col\">" + item[8] + "<br/> Price/pc: " + item[10] + " € <br/> Sum: <span id=\"order-sum-" + item[12] + "\">" + item[10] + "</span> € <br/> Quantity in Order number "+ item[5] +": <span id=\"order-count-" + item[0] + "\">" + item[12] + "</span> </br> </div>";
          console.log(item[1]);
        })
        $("#orders").html($output);
      
      }
     // $("#totals").html($total);
    
  
  
    });    
  });