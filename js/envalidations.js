
  invalid_fields_on_page=  0;
var f=0,l=0,e=0,p=0,m=0,a=0,pa=0;
var f1=0,l1=0,e1=0,p1=0,m1=0,a1=0,pa1=0;
var cf=0,cl=0,cm=0;
var x=0,y=0;
var flname= localStorage.getItem("fname");
if(flname==null){
    location.assign("index.php");
    alert("Dude You think u can access pages without login hahah...!")
}
var llname= localStorage.getItem("lname");
var clients1 = localStorage.getItem("clients");
var investors1 = localStorage.getItem("investors");
var balance1 =localStorage.getItem("balance");
var mobile1 = localStorage.getItem("mobile");


$('.navbar-nav .btn-trial1 a').text(flname+"."+llname);
$("#noofclients").text(clients1);
$("#noofinvestors").text(investors1);
if(balance1==null){
   $(".balanceamount").text('0');  
}
$(".balanceamount").text(balance1);

 var clientloan=localStorage.getItem("clientloan");
var investorinvest=localStorage.getItem("investorinvest");

var profit=( parseInt((2.50*parseInt(clientloan))/100)  -  parseInt((1.50*parseInt(investorinvest))/100) );
$(".earningsamount").text(profit);
if(profit<=0)
$(".earnings-btn").text("Yes your profit is negative because you have investors but less clients");
else
$(".earnings-btn").text("Your are good to go hope to find you as a investor...!");    
$("#chanfname").attr("value",flname)
$("#chanlname").attr("value",llname);
$("#chanmobile").attr("value",mobile1);

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
      $("#fname11").removeClass('has-success').addClass('has-error');
        $("#fname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
       
          
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#lname11").removeClass('has-success').addClass('has-error');
        $("#lname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
     
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#email11").removeClass('has-success').addClass('has-error');
        $("#email11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
     
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
    	$(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#fpsw11").removeClass('has-success').addClass('has-error');
        $("#fpsw11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
     
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
    $(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
       $("#fcpsw11").removeClass('has-success').addClass('has-error');
    $("#fcpsw11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
    
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#mobile11").removeClass('has-success').addClass('has-error');
        $("#mobile11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
    
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
        $("#aadhar11").removeClass('has-success').addClass('has-error');
        $("#aadhar11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
      
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#pan11").removeClass('has-success').addClass('has-error');
        $("#pan11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red'); 
   
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
        var fid= localStorage.getItem("fid");
        $(this).find($(".register11")).removeClass('has-error').addClass('has-success');
        $(this).find($(".register11")).addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
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
        if(result.success){
          $(".register11").removeClass('has-error').addClass('has-success').removeClass('glyphicon-remove');
            $(".register11").removeClass('glyphicon-refresh').addClass('glyphicon-ok').removeClass('glyphicon-refresh-animate');
            var message1="Registration Successfull Kindly Activate your Account from the Mail sent to u.!"
            localStorage.setItem("clients",parseInt(clients1)+1);
            var clients2 = localStorage.getItem("clients")
            $("#noofclients").text(clients2);
           $('#signup-message').html(message1);
        }else{
            $(".register11").removeClass('has-success').addClass('has-error');
                $(".register11").removeClass('glyphicon-refresh').addClass('glyphicon-remove').removeClass('glyphicon-refresh-animate');
            $('#signup-message').html(result.message);
        }
    });
    }
    else{
        var message="Validation not approved"
        $('#signup-message').html(message);
    }
});

$(document).on('click','.logout-btn a',function(){
    localStorage.clear();
    location.assign("index.php");
});

$(document).on('blur','.fname-validation1',function(){
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
	f1=1;	// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        $("#fname12").removeClass('has-error').addClass('has-success');
        $("#fname12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green');
        
                
  }else{
	    $(this).css('border','1px solid red');
        $("#fname11").css('color', 'red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#fname12").removeClass('has-success').addClass('has-error');
        $("#fname12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
          
  }
});
    
$(document).on('blur','.lname-validation1',function(){
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
		l1=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
       
        $("#lname12").removeClass('has-error').addClass('has-success');
        $("#lname12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green');
        
  }else{
	    $(this).css('border','1px solid red');  
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
     
      $("#lname12").removeClass('has-success').addClass('has-error');
        $("#lname12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
  }
});    
    
$(document).on('blur','.email-validation1',function(){
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
		 e1=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        
        $("#email12").removeClass('has-error').addClass('has-success');
        $("#email12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green');
       
  }else{
	    $(this).css('border','1px solid red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
    
      $("#email12").removeClass('has-success').addClass('has-error');
        $("#email12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
  }
});    
    
$(document).on('blur','.fpsw-validation1',function(){
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
    
    $("#fpsw12").removeClass('has-error').addClass('has-success');
        $("#fpsw12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
  }else{
    	$(this).css('border','1px solid red');  
    	$(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
     
      $("#fpsw12").removeClass('has-success').addClass('has-error');
        $("#fpsw12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
  }

});

$(document).on('blur','.fcpsw-validation1',function(){
	var content = $(this).val();
	var password = $(this).parent().siblings().find('.fpsw-validation1').val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	invalidArray = content.match(/[^0-9A-Za-z_ ]/g);
	var valid = true;

	/* First, chech if the password entered in the password field is correct*/
	if(($(this).parent().siblings().find('.fpsw-validation1').attr('data-validation') != 'true')){
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
		p1=1;// No errors!
	}

		$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);

	if(valid){
    $(this).css('border','');
    $(this).attr('data-validation',true);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        
        $("#fcpsw12").removeClass('has-error').addClass('has-success');
        $("#fcpsw12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
    $(this).css('border','1px solid red');
    $(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      
       $("#fcpsw12").removeClass('has-success').addClass('has-error');
    $("#fcpsw12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
  }
}); 
    
$(document).on('blur','.mobile-validation1',function(){
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
		 m1=1;// No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        
        $("#mobile12").removeClass('has-error').addClass('has-success');
        $("#mobile12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
       
       
  }else{
	    $(this).css('border','1px solid red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
     
      $("#mobile12").removeClass('has-success').addClass('has-error');
        $("#mobile12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
  }
});  
    
$(document).on('blur','.aadhar-validation1',function(){
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
		a1=1;// No errors!
	}
    
	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
       
        $("#aadhar12").removeClass('has-error').addClass('has-success');
        $("#aadhar12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
  }else{
	    $(this).css('border','1px solid red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
       
      $("#aadhar12").removeClass('has-success').addClass('has-error');
        $("#aadhar12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
  }
});      
    
$(document).on('blur','.pan-validation1',function(){
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
		pa1=1;// No errors!
	}
	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);
	if(valid){
	    $(this).css('border','');
	    $(this).attr('data-validation',true);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
      
        $("#pan12").removeClass('has-error').addClass('has-success');
        $("#pan12").removeClass('glyphicon-asterisk').addClass('glyphicon-ok').css('color', 'green'); 
        
  }else{
	    $(this).css('border','1px solid red');
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
     
      $("#pan12").removeClass('has-success').addClass('has-error');
        $("#pan12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red'); 
  }
}); 

$(document).on('click','.signupinvestor-btn',function(){
    if(f1==1 && l1==1 && e1==1 && p1==1 && m1==1 && pa1==1){
        var fname = $('.fname-validation1').val();
	    var lname = $('.lname-validation1').val();
	    var email = $('.email-validation1').val();
	    var fpsw = $('.fpsw-validation1').val();
        var mobile = $('.mobile-validation1').val();
        var aadhar = $('.aadhar-validation1').val();    
        var panid = $('.pan-validation1').val(); 
        var fid= localStorage.getItem("fid");
        $(this).find($(".register12")).removeClass('has-error').addClass('has-success');
        $(this).find($(".register12")).addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
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
        if(result.success){
           $(".register12").removeClass('has-error').addClass('has-success').removeClass('glyphicon-remove');
            $(".register12").removeClass('glyphicon-refresh').addClass('glyphicon-ok').removeClass('glyphicon-refresh-animate');
            var message1="Registration Successfull Kindly Activate your Account from the Mail sent to u.!"
            $('#signup-message1').html(message1);
            localStorage.setItem("investors",parseInt(investors1)+1);
           var investors2 = localStorage.getItem("investors")
            $("#noofinvestors").text(investors2);
        }else{
           $(".register12").removeClass('has-success').addClass('has-error');
                $(".register12").removeClass('glyphicon-refresh').addClass('glyphicon-remove').removeClass('glyphicon-refresh-animate');
            $('#signup-message1').html(result.message);
        }
    });
    }
    else{
        var message2="Validation not approved"
        $('#signup-message1').html(message2);
    }
});
       
$(document).on('click','#fregclose1',function(event){
         $('.fname-validation').val("");
         $('.lname-validation').val("");
	     $('.email-validation').val("");
	     $('.fpsw-validation').val("");
         $('.mobile-validation').val("");
         $('.aadhar-validation').val("");    
         $('.pan-validation').val("");
        $("#fname11").removeClass('has-success').addClass('has-error');
        $("#fname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#lname11").removeClass('has-success').addClass('has-error');
        $("#lname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#email11").removeClass('has-success').addClass('has-error');
        $("#email11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')  
        $("#fpsw11").removeClass('has-success').addClass('has-error');
        $("#fpsw11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#fcpsw11").removeClass('has-success').addClass('has-error');
        $("#fcpsw11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#mobile11").removeClass('has-success').addClass('has-error');
        $("#mobile11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#aadhar11").removeClass('has-success').addClass('has-error');
        $("#aadhar11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $("#pan11").removeClass('has-success').addClass('has-error');
        $("#pan11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
        $('#signup-message').empty(""); 
    
});

$(document).on('click','#fregclose2',function(event){
         $('.fname-validation').val("");
         $('.lname-validation').val("");
	     $('.email-validation').val("");
	     $('.fpsw-validation').val("");
         $('.mobile-validation').val("");
         $('.aadhar-validation').val("");    
         $('.pan-validation').val(""); 
         $("#fname12").removeClass('has-success').addClass('has-error');
         $("#fname12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $("#lname12").removeClass('has-success').addClass('has-error');
         $("#lname12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $("#email12").removeClass('has-success').addClass('has-error');
         $("#email12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk') 
         $("#fpsw12").removeClass('has-success').addClass('has-error');
         $("#fpsw12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $("#fcpsw12").removeClass('has-success').addClass('has-error');
         $("#fcpsw12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $("#mobile12").removeClass('has-success').addClass('has-error');
         $("#mobile12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk') 
         $("#aadhar12").removeClass('has-success').addClass('has-error');
         $("#aadhar12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $("#pan12").removeClass('has-success').addClass('has-error');
         $("#pan12").removeClass('glyphicon-ok').addClass('glyphicon-asterisk')
         $('#signup-message1').empty(); 
});

$(document).on('click','.addfund',function(event){
    var fund = $('.fund').val();
    var fid = localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    $(this).find($(".register15")).removeClass('has-error').addClass('has-success');
    $(this).find($(".register15")).addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
    if($.isNumeric(fund)){
    $.post("http://localhost:80/Finment/financierfuc.php",{
        fund:fund,
        fid:fid,
        email:email
        },function(data){
        var result = JSON.parse(data);
        if(result.success){
           $(".register15").removeClass('has-error').addClass('has-success').removeClass('glyphicon-remove');
            $(".register15").removeClass('glyphicon-refresh').addClass('glyphicon-ok').removeClass('glyphicon-refresh-animate');
            localStorage.setItem("balance",parseInt(balance1)+parseInt(fund));
            var balance2 =localStorage.getItem("balance");
            $(".balanceamount").text(balance2);
            var message1="fund inserted successfully"
           $('#signup-message5').html(message1);
        }else{
           $(".register15").removeClass('has-success').addClass('has-error');
                $(".register15").removeClass('glyphicon-refresh').addClass('glyphicon-remove').removeClass('glyphicon-refresh-animate');
            $('#signup-message5').html(result.message);
        }
    });
    }else{
        var message2="Validation not approved"
        $('#signup-message5').html(message2);
    }
});

$(document).on('blur','.cfname-validation',function(){
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
	cf=1;	// No errors!
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
      $("#fname11").removeClass('has-success').addClass('has-error');
        $("#fname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
       
          
  }
});
    
$(document).on('blur','.clname-validation',function(){
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
		cl=1;// No errors!
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#lname11").removeClass('has-success').addClass('has-error');
        $("#lname11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');
     
  }
}); 

$(document).on('blur','.cmobile-validation',function(){
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
		 cm=1;// No errors!
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
	    $(this).attr('data-validation',false);
	    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
      $("#mobile11").removeClass('has-success').addClass('has-error');
        $("#mobile11").removeClass('glyphicon-ok').addClass('glyphicon-asterisk').css('color', 'red');  
    
  }
});  

$(document).on('click','.editprof-btnsave',function(){
    if(cf==1 && cl==1 && cm==1){
        var fname = $('.cfname-validation').val();
	    var lname = $('.clname-validation').val();
        var mobile = $('.cmobile-validation').val();
        var fid= localStorage.getItem("fid");
        var category = "Financier";
        $.post("http://localhost:80/Finment/financiereditprof.php",{
        fname:fname,
		lname:lname,
        mobile:mobile,
        fid:fid,
        category:category    
        },function(data){
        var result = JSON.parse(data);
        if(result.success){
            localStorage.setItem("fname",fname);
            localStorage.setItem("lname",lname);
            localStorage.setItem("mobile",mobile);
            var message1="saved successfully"
           $('#editprof-message').html(message1);
        }else{
            $('#editprof-message').html(result.message);
        }
    });
    }else{
        var message2="Validation not approved"
        $('#editprof-message').html(message2);
    }
});

$(document).on('click','.editprof-btn',function(){
$("#chanfname").removeAttr("readonly");
$("#chanlname").removeAttr("readonly");
$("#chanmobile").removeAttr("readonly");
});
    
$(document).on('click','.clientdetails-btn',function(){
   $("#clientdetails").modal();
    var fid= localStorage.getItem("fid");  
    var content = '';
    $.post("http://localhost:80/Finment/clientdetails.php",{fid:fid},function(data){
        var json = jQuery.parseJSON(data);
         var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td><input type="checkbox"/></td>';
            content += '<td>' + json[i].fname + '</td>';
            content += '<td>' + json[i].mobile + '</td>';
            content += '<td>' + json[i].email + '</td>';
            content += '</tr>';
            }
        $("#tblbody").html(content);
    });
});

$(document).on('click','.investordetails-btn',function(){
   $("#investordetails").modal();
    var fid= localStorage.getItem("fid");  
    var content = '';
    $.post("http://localhost:80/Finment/investordetails.php",{fid:fid},function(data){
        var json = jQuery.parseJSON(data);
         var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td><input type="checkbox"/></td>';
            content += '<td>' + json[i].fname + '</td>';
            content += '<td>' + json[i].mobile + '</td>';
            content += '<td>' + json[i].email + '</td>';
            content += '</tr>';
            }
        $("#tblbody2").html(content);
    });
});

$(document).on('click','.balancedetails-btn',function(){
   $("#balancedetails").modal();
    var fid= localStorage.getItem("fid");  
    var content = '';
    $.post("http://localhost:80/Finment/balancedetails.php",{fid:fid},function(data){
        var json = jQuery.parseJSON(data);
         var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td class="text-right">' + json[i].amountadded + '</td>';
            content += '<td class="text-right">' + json[i].amountreturned + '</td>';
            content += '<td class="text-right">' + json[i].balance + '</td>';
            content += '</tr>';
            }
        $("#tblbody3").html(content);
    });
});

$(document).on('click','.taxdetails-btn',function(){
    $("#taxdetails").modal();
    var fid= localStorage.getItem("fid");
    var email= localStorage.getItem("email");
    var profit=( parseInt((2.50*parseInt(clientloan))/100)  -  parseInt((1.50*parseInt(investorinvest))/100) );
    var content = '';
    $.post("http://localhost:80/Finment/fintaxdetails.php",{fid:fid,profit:profit,email:email},function(data){
        var json = jQuery.parseJSON(data);
        var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td>' + json[i].email + '</td>';
            content += '<td>' + json[i].interestearned +'<span>&nbsp Rs/-</span></td>';
            content += '<td>' + json[i].taxutp + '</td>';    
            content += '</tr>';
            }
        $("#tblbody15").html(content);
    });
});

$(document).on('blur','.prevfpsw',function(){
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
       x=1; // No errors!
	}

	$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);

if(valid){
    $(this).css('border','');
    $(this).attr('data-validation',true);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
  
  }else{
    	$(this).css('border','1px solid red');  
    	$(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
 
     
  }

});

$(document).on('blur','.newfpsw',function(){
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

   
  }else{
    	$(this).css('border','1px solid red');  
    	$(this).attr('data-validation',false);
        $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
     
     
  }

});

$(document).on('blur','.confnewfpsw',function(){
	var content = $(this).val();
	var password = $(this).parent().siblings().find('.newfpsw').val();
	var message = '';
	/*Check for punctuation. See if there is a better way*/
	invalidArray = content.match(/[^0-9A-Za-z_ ]/g);
	var valid = true;
	/* First, chech if the password entered in the password field is correct*/
	if(($(this).parent().siblings().find('.newfpsw').attr('data-validation') != 'true')){
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
		y=1;// No errors!
	}

		$(this).closest('.login-box-body').siblings('.modal-footer').find('.message').html(message);

	if(valid){
    $(this).css('border','');
    $(this).attr('data-validation',true);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','green');
        
        
  }else{
    $(this).css('border','1px solid red');
    $(this).attr('data-validation',false);
    $(this).closest('.login-box-body').siblings('.modal-footer').find('.message').css('color','red');
    
  }
}); 

$(document).on('click','.chanpass-btn',function(){
    if(x==1 && y==1){
    var prevfpsw = $('.prevfpsw').val();
    var newfpsw = $('.newfpsw').val();
    var confpsw = $('.confnewfpsw').val();
    var email= localStorage.getItem("email");
    var category = "Financier";
      $.post("http://localhost:80/Finment/chanpass.php",{
        prevfpsw:prevfpsw,
        newfpsw:newfpsw,
        email:email,  
        category:category  
        },function(data){
        var result = JSON.parse(data);
        if(result.success){
            var message1="saved successfully"
           $('#change-message').html(message1);
        }else{
            $('#change-message').html(result.message);
        }
    });
    }else{
        var message2="Validation not approved"
        $('#change-message').html(message2);
    }
});

$(document).on('click','.clientrequest-btn',function(){
   $("#clientrequest").modal();
    var fid= localStorage.getItem("fid");  
    var content = '';
    $.post("http://localhost:80/Finment/clientrequest.php",{fid:fid},function(data){
        var json = jQuery.parseJSON(data);
         var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td class="clientemail">' + json[i].email + '</td>';
            content += '<td class="amountrequested">' + json[i].amountrequested+ '</td>';
            content += '<td class="interestrate">' + json[i].interestrate + '</td>';
            content += '<td class="amountrepay">' + json[i].amountrepay + '</td>'; 
            content += '<td><input type="checkbox"/></td>' ; 
            content += '</tr>';
            }
        $("#tblbody4").html(content);
    });
});

$(document).on('click','.btn-approve',function(){
        var fid= localStorage.getItem("fid"); 
        $('#tblGrid1 tbody').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            var clientemail = row.find(".clientemail").text();
            var amountrequested = row.find(".amountrequested").text();
            var interestrate = row.find(".interestrate").text();
            var amountrepay = row.find(".amountrepay").text();
            if(amountrepay=="null"){
            var category="loan";
             $.post("http://localhost:80/Finment/clientrequestacc.php",
                    {
                    fid:fid,
                    email:clientemail,
                    amountrequested:amountrequested,
                    category:category
                    },function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success)
                        {
                            var message1="loan approved successfully"
                            row.remove();
                            var balan = localStorage.getItem("balance");
                            localStorage.setItem("balance",(parseInt(balan)-parseInt(amountrequested)));
                            var balance2=localStorage.getItem("balance");
                            $(".balanceamount").text(balance2); 
                            $('#signup-message8').html(message1);
                        }else
                        {
                            $('#signup-message8').html(result.message);
                        }
                    });   
            }else if(amountrequested=="null"){
             var category="repay";
             $.post("http://localhost:80/Finment/clientrequestacc.php",
                    {
                    fid:fid,
                    email:clientemail,
                    amountrepay:amountrepay,
                    category:category
                    },function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success)
                        {
                            var message1="repay approved successfully"
                            row.remove();
                            var balan = localStorage.getItem("balance");
                            localStorage.setItem("balance",(parseInt(balan)+parseInt(amountrepay)));
                            var balance3=localStorage.getItem("balance");
                            $(".balanceamount").text(balance3); 
                            $('#signup-message8').html(message1);
                        }else
                        {
                            $('#signup-message8').html(result.message);
                        }
                    });
            }else{
                
            }
        }
    });
});

$(document).on('click','.investorrequest-btn',function(){
   $("#investorrequest").modal();
    var fid= localStorage.getItem("fid");  
    var content = '';
    $.post("http://localhost:80/Finment/investorrequest.php",{fid:fid},function(data){
        var json = jQuery.parseJSON(data);
         var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td class="investoremail">' + json[i].email + '</td>';
            content += '<td class="amountinvest">' + json[i].amountinvest+ '</td>';
            content += '<td class="interestrate">' + json[i].interestrate + '</td>';
            content += '<td class="amountback">' + json[i].amountback + '</td>'; 
            content += '<td><input type="checkbox"/></td>' ; 
            content += '</tr>';
            }
        $("#tblbody5").html(content);
    });
});

$(document).on('click','.iapproval-btn',function(){
        var fid= localStorage.getItem("fid"); 
        $('#tblGrid2 tbody').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            var investoremail = row.find(".investoremail").text();
            var amountinvest = row.find(".amountinvest").text();
            var interestrate = row.find(".interestrate").text();
            var amountback = row.find(".amountback").text();
            
            if(amountback=="null"){
            var category="invest";
             $.post("http://localhost:80/Finment/investorrequestacc.php",
                    {
                    fid:fid,
                    email:investoremail,
                    amountinvest:amountinvest,
                    category:category
                    },function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success)
                        {
                            var message1="investment approved successfully"
                            row.remove();
                            var locbal = localStorage.getItem("balance");
                            localStorage.setItem("balance",(parseInt(locbal)+parseInt(amountinvest)));
                            var balance2=localStorage.getItem("balance");
                            $(".balanceamount").text(balance2); 
                            $('#signup-message12').html(message1);
                        }else
                        {
                            $('#signup-message12').html(result.message);
                        }
                    });   
            }else if(amountinvest=="null"){
             var category="backamt";
             $.post("http://localhost:80/Finment/investorrequestacc.php",
                    {
                    fid:fid,
                    email:investoremail,
                   amountback:amountback,
                    category:category
                    },function(data)
                    {
                        var result = JSON.parse(data);
                        if(result.success)
                        {
                            var message1="repay approved successfully"
                            row.remove();
                            var locbal2=localStorage.getItem("balance");
                            localStorage.setItem("balance",(parseInt(locbal2)-parseInt(amountback)));
                            var balance3=localStorage.getItem("balance");
                            $(".balanceamount").text(balance3); 
                            $('#signup-message12').html(message1);
                        }else
                        {
                            $('#signup-message12').html(result.message);
                        }
                    });
            }else{
                
            }
        }
    });
});