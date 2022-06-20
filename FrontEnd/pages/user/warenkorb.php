<?php
    include '../webstructure/head.php';
?>


    <title>Shopping Cart</title>
</head>
<body>
  <?php
    include '../webstructure/menuleiste.php';
  ?>

<div class="container-fluid">
            <div class="row" id="orders">

            </div>
          </div>
          <div class="row" id="totals">

            </div>
          <button onclick="sendOrder()">Send order</button>

 

  <script type="text/javascript">

function deleteOrder(orderId) {
console.log(orderId);
$.ajax({
    type: "POST",
    url: '../../BackEnd/logic/orders.php',
    data: {method: 'delete', orderId: orderId},
    success: function(response) {
      console.log(response);

      var jsonData = JSON.parse(response);
      $("#korb-count").html(jsonData['data']);
      console.log(jsonData);
      $("#order-" + orderId).remove();
    }
  })
}

function sendOrder() {
$.ajax({
    type: "POST",
    url: '../../BackEnd/logic/orders.php',
    data: {method: 'send'},
    success: function(response) {
      console.log(response);
      var jsonData = JSON.parse(response);
      $("#korb-count").html(0);
      console.log(jsonData);
    }
  })
}

$(document).ready(function() {
  $.ajax({
    type: "POST",
    url: '../../BackEnd/logic/orders.php',
    data: {method: 'list', status: 'korb'},
    success: function(response) {
      console.log(response);
      var jsonData = JSON.parse(response);
      $output = "";
      $total = "aaa";
      jsonData.forEach(function (item, index) {
       
        $output += "<div id=\"order-" + item[0] + "\" class=\"col\">" + item[8] + "<br/> Price/pc: " + item[10] + " € <br/> Sum: <span id=\"order-sum-" + item[12] + "\">" + item[13] + "</span> € <br/> Quantity: <span id=\"order-count-" + item[0] + "\">" + item[12] + "</span><a href=\"#\" onclick=\"buyProduct('" + item[2] + "', 'order-count-" + item[0] + "')\"> + </a></br><a href=\"#\" onclick=\"deleteOrder('" + item[0] + "')\">REMOVE</a> </br> </div>";
        console.log(item[1]);
      })
      $("#orders").html($output);
      

    
    }
   // $("#totals").html($total);
  


  });    
});
    </script>