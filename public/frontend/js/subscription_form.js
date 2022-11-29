jQuery(document).ready(function($) {

	"use strict";
	
	
// 	$('#subscribe_button').on('click', function(){
//         console.log("subscribe_button clicked");
// 		//$('#language-selector-modal').modal('show');
// 	});
	
	  $("#subscribe_button").click(function(event){
      event.preventDefault();

     
      let email = $("input[name=subscribe_email]").val();
      let _token   = $('input[name=_token]').val();

      $.ajax({
        url: "/subscribe_user",
        type:"POST",
        data:{
          subscribe_email:email,
          _token: _token
        },
        success:function(response){
          //console.log(response);
          $('.subscribe_message').text("");
           $('#emailError').text("");
           $('.already_message').text("");
          if(response) {
           if(response.already){
                 $('.already_message').text(response.message);    
           } else {
                $('.subscribe_message').text(response.message);
           }

          }
        },
        error: function(error) {
             //console.log("In error clause");
            // console.log(error);
           // console.log(error.errors);
          $('#emailError').text("");
          $('.subscribe_message').text("");
           $('.already_message').text("");
          if(error.responseJSON.errors){
            $('#emailError').text(error.responseJSON.errors.subscribe_email[0]);
          } else {
               $('#emailError').text(error.responseJSON.message);
          }

         
        }
       });
  });
  
	 
	
});

