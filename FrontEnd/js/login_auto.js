function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
$(document).ready(function(){
    
if(getCookie("safe") != ""){      
    $.ajax({
        url: "http://localhost/Dream-Coffin/BackEnd/logic/loginFkt.php",
        type: "POST",
        data: {
            username: getCookie("username"),
           
            password: getCookie("password")						
        },
        cache: false,
        success: function(dataResult){
            // var dataResult = JSON.parse(dataResult);
            console.log("loginFkt", dataResult);
            if(dataResult == "success"){
                console.log("login_drin");
                location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/index.php";						
            }
            else if(dataResult == "error"){
                location.href = "http://localhost/Dream-Coffin/FrontEnd/pages/error.php";
                }
            
        }
    
    })

}
})
