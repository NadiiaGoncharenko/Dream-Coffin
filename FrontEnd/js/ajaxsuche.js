// on change 

 // function showResult(str) {


//     $(document).ready(function() {
//       $('#search').on('change', function() {
//       $("#search").attr("disabled", "disabled");
//       var search = $('#search').val();
      
//       if(search !="" ){
//           $.ajax({
//             url: "http://localhost/Dream-Coffin/BackEnd/logic/livesearch.php",
//             type: "GET",
//             data: {
//               product_name: search				
//             },
//             cache: false,
//             success: function(dataResult){
//               console.log(dataResult);
//               var dataResult = JSON.parse(dataResult);
//               if(dataResult.statusCode==200){
//                 $("#search").removeAttr("disabled");
//                 $('#fupForm').find('input:text').val('');
//                 $("#success").show(dataResult); 						
//               }
//               else if(dataResult.statusCode==201){
//                 alert("Error occured !");
//               }
//             }
//         });
//      }
//   })
// })



$(document).ready(function(){
  $('.search-box input[type="text"]').on("keyup input", function(){
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(this).siblings(".result");
      if(inputVal.length){
          $.get("http://localhost/Dream-Coffin/BackEnd/logic/backend-search.php", {term: inputVal}).done(function(data){
              // Display the returned data in browser
              resultDropdown.html(data);
          });
      } else{
          resultDropdown.empty();
      }
  });
  
  // Set search input value on click of result item
  $(document).on("click", ".result p", function(){
      $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
      $(this).parent(".result").empty();
  });
});