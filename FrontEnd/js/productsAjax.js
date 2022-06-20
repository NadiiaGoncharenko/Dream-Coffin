function buyProduct(productId, countSpan = null) {
    console.log(productId);
    $.ajax({
        type: "POST",
        url: '../../BackEnd/logic/orders.php',
        data: {method: 'buy', productId: productId},
        success: function(response) {
          console.log(response);
    
          var jsonData = JSON.parse(response);
          $("#korb-count").html("Number of products: " + jsonData['data']);
          if (countSpan !== null) {
              $productCount = parseInt($("#" + countSpan).html());
              console.log($productCount);
              $("#" + countSpan).html($productCount + 1);
          }
          console.log(jsonData);
        }
      })
    
    }
    
    function getProducts(category) {
          console.log(category);
          $.ajax({
        type: "POST",
        url: '../../BackEnd/logic/products.php',
        data: {data: category},
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData);
          $output = "";
          jsonData.forEach(function (item, index) {
            $output += "<div class=\"col\">" + item[2] + "</br> " + item[3] + " </br> Price: " + item[4] + "€ </br> <a href=\"#\" onclick=\"buyProduct('" + item[0] + "')\">In den Warenkorb ablegen</a> </br> <img src= '" + item[5] + "' > </br> </br> </div>";
                        
            console.log(item[2]);
          })
          $("#products").html($output);
        }
      })
      }

    /*   function getOrders(grouporder) {
        console.log(grouporder);
        $.ajax({
      type: "POST",
      url: '../../BackEnd/logic/products_order.php',
      data: {data: grouporder},
      success: function(response) {
        var jsonData = JSON.parse(response);
        console.log(jsonData);
        $output = "";
        jsonData.forEach(function (item, index) {
          $output += "<div class=\"col\">" + item[2] + "</br> " + item[3] + " </br> Price: " + item[4] + "€ </br> <a href=\"#\" onclick=\"buyProduct('" + item[0] + "')\">In den Warenkorb ablegen</a> </br> <img src= '" + item[5] + "' > </br> </br> </div>";
                      
          console.log(item[2]);
        })
        $("#orders").html($output);
      }
    })
    } */



  