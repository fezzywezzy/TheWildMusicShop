	
//Images for rotation of image agfter every load
//Also project spec for use of JS array!
    var images = ['flutebg.jpg', 'bassbg.jpg', 'guitarbg.jpg'];
    
//Build the img, then do a bit of maths to randomize load and append to a div.
    $('<img class="fade-in" src="images/' + images[Math.floor(Math.random() * images.length)] + '">').appendTo('#banner-load');

    
    
//jQuery set up for the login modal
    $(document).ready(function(){
		$('#myModal').modal('show')

       
	});
 
//Setting a boolean for loginstatus
    var loginstatus = 0;


//Function for log in... gonna keep it simple! was initially going to link to DB but if its just needed to 
//be simple I decided to keep it that way..
//maybe if I have more time in future, if I put this on GitHub, I will link to a DB
    function login(){        
        //Getting user inputted values and initialising variables
        var usern = document.getElementById("username").value;
        var password = document.getElementById("pass").value;
        var email = document.getElementById("email").value;
            // Condition to check if the log in credentials are good
            if(usern == "user"  && password =="pass" && email == "user@user"){
                //loginstatus boolean goes to 1
                loginstatus = 1;
                document.getElementById("pass").value = '';
                document.getElementById("email").value = '';
                document.getElementById("username").value = '';
                
                alert("Welcome!");

                //hides modal after login
                $('#myModal').modal('hide')
               
            }
            //If not good..
            else{
                alert("Username or password incorrect.")
            }
        return false;
    }
    //Payment only possible if user is logged in.
    function payment(){
        //gets a value for the php value total
        var total = document.getElementById("total-value").dataset.total;
        //\checks if boolean is changed
        if(loginstatus === 1){
            alert("Thank you for placing your order! Order no. 123. cost: $"+total.toString() );
        }else{
            alert("Please login before purchase.")
        }
    }
    //Initially had a set up for validating email and name but bootstrap seems to do it automatically...

    // function validateEmail(mail) 
    // {
    //  if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myForm.emailAddr.value))
    //   {
    //     return (true)
    //   }
    //     alert("You have entered an invalid email address!")
    //     return (false)
    // }

    // function validatename() {
    //     var x = document.forms["myForm"]["fname"].value;
    //     if (x == "") {
    //       alert("Name must be filled out");
    //       return false;
    //     }
    //   }

    //   function formValidation(){
    //     var uid = document.registration.username;
    //     var passid = document.registration.pass;
    //     var email = document.registration.email;
    //   }
