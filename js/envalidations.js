
  invalid_fields_on_page=  0;
var f=0,l=0,e=0,p=0,m=0,a=0,pa=0;
var  flname=localStorage.getItem("fname");
var  lname=localStorage.getItem("lname");
var fid= localStorage.getItem("fid");
$('.navbar-nav .btn-trial1 a').text(flname+" "+lname);
    
$(document).on('blur','.fname-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	validArray = content.match(/^[a-zA-Z]+$/);
	var valid = true;

	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your First name"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid first Name";//made change
		//console.log(invalidArray);
	}else{
	f=1;	// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#fname11").removeClass('has-error').addClass('has-success');
        $("#fname11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green');   
        
                
  }else{
	    $(this).css('border','1px solid red');
        $("#fname11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
          
  }
});
    
$(document).on('blur','.lname-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	validArray = content.match(/^[a-zA-Z]+$/);
	var valid = true;

	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your Last name"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid Last name";//made change
		//console.log(invalidArray);
	}else{
		l=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#lname11").removeClass('has-error').addClass('has-success');
        $("#lname11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
	    $(this).css('border','1px solid red');
      $("#lname11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
});    
    
$(document).on('blur','.email-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	validArray = content.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
	var valid = true;
    
	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your email"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid email";//made change
		//console.log(invalidArray);
	}else{
		 e=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#email11").removeClass('has-error').addClass('has-success');
        $("#email11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
       
  }else{
	    $(this).css('border','1px solid red');
      $("#email11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
});    
    
$(document).on('blur','.fpsw-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	invalidArray = content.match(/[^0-9A-Za-z_ ]/g);
	var valid = true;

	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Field";
	}else if(invalidArray != null){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter only Alpgabets, digits and underscore");
		console.log(invalidArray);
		message = "Enter only Alpgabets, digits and underscore";
	}else if(content.length < 8){
		valid = false;
		invalid_fields_on_page++;
		console.log("Password should have atleast 8 characters");
		message = "Password should have atleast 8 characters";
	}else{
        // No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);

if(valid){
    $(this).css('border','');
    $(this).attr('data-validation',true);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
    $("#fpsw11").removeClass('has-error').addClass('has-success');
        $("#fpsw11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
  }else{
    	$(this).css('border','1px solid red');
      $("#fpsw11").css('color', 'red');
    	$(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }

});

$(document).on('blur','.fcpsw-validation',function(){
	var content = $(this).val();
	var password = $(this).parent().siblings().find('.fpsw-validation').val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	invalidArray = content.match(/[^0-9A-Za-z_ ]/g);
	var valid = true;

	/* First, chech if the password entered in the password field is correct*/
	if(($(this).parent().siblings().find('.fpsw-validation').attr('data-validation') != 'true')){
		valid = false;
		invalid_fields_on_page++;
		console.log("First enter a Correct Password");
		message = "First enter a Correct Password";
	}else if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter field ";
	}else if(password.length == 0){
		/*If nothing is entered in the password field (redundant)*/
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter Password First ");
		message = "Enter Password First ";
	}else if(password != content){
		valid = false;
		invalid_fields_on_page++;
		console.log("Passwords Dont match");
		message = "Passwords Dont match";
	}else{
		p=1;// No errors!
	}

		$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);

	if(valid){
    $(this).css('border','');
    $(this).attr('data-validation',true);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#fcpsw11").removeClass('has-error').addClass('has-success');
        $("#fcpsw11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
    $(this).css('border','1px solid red');
      $("#fcpsw11").css('color', 'red');
    $(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
}); 
    
$(document).on('blur','.mobile-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	validArray = content.match(/^[789]\d{9}$/);
	var valid = true;

	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your mobile"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid mobile number";//made change
		//console.log(invalidArray);
	}else{
		 m=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#mobile11").removeClass('has-error').addClass('has-success');
        $("#mobile11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
       
  }else{
	    $(this).css('border','1px solid red');
        $("#mobile11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
});  
    
$(document).on('blur','.aadhar-validation',function(){
	var d = [
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
    [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
    [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
    [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
    [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
    [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
    [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
    [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
    [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
    [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
];

// permutation table p
var p = [
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
    [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
    [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
    [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
    [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
    [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
    [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
    [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
];

// inverse table inv
var inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

// converts string or number to an array and inverts it
function invArray(array) {

    if (Object.prototype.toString.call(array) === "[object Number]") {
        array = String(array);
    }

    if (Object.prototype.toString.call(array) === "[object String]") {
        array = array.split("").map(Number);
    }

    return array.reverse();

}

// generates checksum
function generate(array) {

    var c = 0;
    var invertedArray = invArray(array);

    for (var i = 0; i < invertedArray.length; i++) {
        c = d[c][p[((i + 1) % 8)][invertedArray[i]]];
    }

    return inv[c];
}

// validates checksum
function validate(array) {

    var c = 0;
    var invertedArray = invArray(array);

    for (var i = 0; i < invertedArray.length; i++) {
        c = d[c][p[(i % 8)][invertedArray[i]]];
    }

    return (c === 0);
}
    var content = $(this).val();
    var message = '';
    validArray = validate(content);
    var valid = true;
    if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your aadhar"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid aadhar";//made change
		//console.log(invalidArray);
	}else{
		a=1;// No errors!
	}
    
	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#aadhar11").removeClass('has-error').addClass('has-success');
        $("#aadhar11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
	    $(this).css('border','1px solid red');
        $("#aadhar11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
});      
    
$(document).on('blur','.pan-validation',function(){
	var content = $(this).val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	validArray = content.match(/[a-zA-z]{5}\d{4}[a-zA-Z]{1}/);
	var valid = true;

	if(content.length == 0){
		valid = false;
		invalid_fields_on_page++;
		console.log("Enter field ");
		message = "Enter Your Pan id"; //made change
	}else if(validArray == null){
		valid = false;
		invalid_fields_on_page++;
		console.log("inalid text input");
		message = "Invalid Pan id";//made change
		//console.log(invalidArray);
	}else{
		pa=1;// No errors!
	}
	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#pan11").removeClass('has-error').addClass('has-success');
        $("#pan11").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
	    $(this).css('border','1px solid red');
        $("#pan11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
  }
}); 
    
$(document).on('click','.signupclient-btn',function(){
    
    if(f==1 && l==1 && e==1 && p==1 && m==1 && pa==1){
        var fname = $('.fname-validation').val();
	    var lname = $('.lname-validation').val();
	    var email = $('.email-validation').val();
	    var fpsw = $('.fpsw-validation').val();
        var mobile = $('.mobile-validation').val();
        var aadhar = $('.aadhar-validation').val();    
        var panid = $('.pan-validation').val(); 
        
        var message="Validation approved"
        $('#signup-message1').html(message);
        $.post("http://localhost:80/Finment/clientregister.php",{
        fname:fname,
		lname:lname,
		email:email,
		fpsw:fpsw,
        mobile:mobile,
        aadhar:aadhar,
        panid:panid,
        fid:fid
        },function(data){
        var result = JSON.parse(data);
        $('#signup-message').html(result.message);
        if(result.success)
           $('#signup-message').html(result.message);
        else
            $('#signup-message').html(result.message);
    });
    }
    else{
        var message="Validation not approved"
        $('#signup-message1').html(message);
    }
});

$(document).on('click','.signupinvestor-btn',function(){
    if(f==1 && l==1 && e==1 && p==1 && m==1 && pa==1){
        var fname = $('.fname-validation').val();
	    var lname = $('.lname-validation').val();
	    var email = $('.email-validation').val();
	    var fpsw = $('.fpsw-validation').val();
        var mobile = $('.mobile-validation').val();
        var aadhar = $('.aadhar-validation').val();    
        var panid = $('.pan-validation').val(); 
        var message="Validation approved"
        $('#signup-message').html(message);
        $.post("http://localhost:80/Finment/investorregister.php",{
        fname:fname,
		lname:lname,
		email:email,
		fpsw:fpsw,
        mobile:mobile,
        aadhar:aadhar,
        panid:panid,
        fid:fid
        },function(data){
        var result = JSON.parse(data);
        $('#signup-message').html(result.message);
        if(result.success)
           $('#signup-message').html(result.message);
        if(result.success=false)
            $('#signup-message').html(result.message);
    });
    }
    else{
        var message="Validation not approved"
        $('#signup-message1').html(message);
    }
});
       
$(document).on('click','#fregclose',function(event){
   $('#signup-message1').empty(); 
});
    
        