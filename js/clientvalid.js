invalid_fields_on_page=  0;
var f=0,l=0,e=0,p=0,m=0,a=0,pa=0;
var f1=0,l1=0,e1=0,p1=0,m1=0,a1=0,pa1=0;
var cf=0,cl=0,cm=0,x=0,y=0;
var flname=localStorage.getItem("fname");
if(flname==null ){
    location.assign("index.php");
    alert("Dude You think u can access pages without login hahah...!");
}

var llname= localStorage.getItem("lname");
var mobile1 = localStorage.getItem("mobile");
var bapproval = localStorage.getItem("bapproval");
var totrequested = localStorage.getItem("totrequested");
var rapproval = localStorage.getItem("rapproval");
var totrepay = localStorage.getItem("totrepay");

$('.navbar-nav .btn-trial1 a').text(flname+"."+llname);
$("#chanfname").attr("value",flname);
$("#chanlname").attr("value",llname);
$("#chanmobile").attr("value",mobile1);
if(parseInt(bapproval)=='1')
$(".borrowed").text(totrequested);
if(parseInt(bapproval)=='0')
$(".borrowed").text("Pending");
if(parseInt(rapproval)=='1')
$(".repaid").text(totrepay);
if(parseInt(rapproval)=='0')
$(".repaid").text("Pending");
if(parseInt(totrepay)==null){
    totrepay='0';
}
if(parseInt(totrequested)==null){
    totrequested='0';
}
var balance = (parseInt(totrequested)-parseInt(totrepay));

if((parseInt(bapproval)==1) && (parseInt(rapproval)==1))
$(".balanceamountpay").text(parseInt(balance));

var interest=((parseInt(balance)*2.50)/100);
$(".interestamount").text(parseInt(interest));

$(document).on('click','.logout-btn a',function(){
    localStorage.clear();
    location.assign("index.php");
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
        var category = "Client";
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
    var category = "Client";
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

$(document).on('click','.addloan-btn',function(event){
    var fund = $('.fund').val();
    var fid = localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    var category="loan"
    $(this).find($(".register15")).removeClass('has-error').addClass('has-success');
    $(this).find($(".register15")).addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
    if($.isNumeric(fund)){
    $.post("http://localhost:80/Finment/clientfuc.php",{
        fund:fund,
        fid:fid,
        email:email,
        category:category
        },function(data){
        var result = JSON.parse(data);
        if(result.success){
           $(".register15").removeClass('has-error').addClass('has-success').removeClass('glyphicon-remove');
            $(".register15").removeClass('glyphicon-refresh').addClass('glyphicon-ok').removeClass('glyphicon-refresh-animate');
            var message1="fund requested successfully"
            $(".borrowed").text("Pending");
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

$(document).on('click','.borroweddetails',function(event){
   $("#borroweddetails").modal();
    var fid= localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    var category = "loan";
    var content = '';
    $.post("http://localhost:80/Finment/borroweddetails.php",{fid:fid,email:email,category:category},function(data){
        var json = jQuery.parseJSON(data); 
        var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td class="text-right">' + json[i].amountrequested + '</td>';
            content += '<td class="text-right">' + json[i].interestrate + '</td>';
            content += '<td class="text-right">' + json[i].totrequested + '</td>';
            content += '<td class="text-right">' + json[i].bapproval + '</td>';
            content += '</tr>';
            }
        $("#tblbody3").html(content);
    }); 
});

$(document).on('click','.repay-btn',function(event){
    var fund = $('.repay').val();
    var fid = localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    var category="repay";
    $(this).find($(".register16")).removeClass('has-error').addClass('has-success');
    $(this).find($(".register16")).addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
    if($.isNumeric(fund)){
    $.post("http://localhost:80/Finment/clientfuc.php",{
        fund:fund,
        fid:fid,
        email:email,
        category:category
        },function(data){
        var result = JSON.parse(data);
        if(result.success){
           $(".register16").removeClass('has-error').addClass('has-success').removeClass('glyphicon-remove');
            $(".register16").removeClass('glyphicon-refresh').addClass('glyphicon-ok').removeClass('glyphicon-refresh-animate');
            var message1="fund requested successfully"
            $(".repaid").text("Pending");
           $('#signup-message6').html(message1);
        }else{
           $(".register16").removeClass('has-success').addClass('has-error');
                $(".register16").removeClass('glyphicon-refresh').addClass('glyphicon-remove').removeClass('glyphicon-refresh-animate');
            $('#signup-message6').html(result.message);
        }
    });
    }else{
        var message2="Validation not approved"
        $('#signup-message5').html(message2);
    }
});

$(document).on('click','.repaydetails',function(event){
   $("#repayeddetails").modal();
    var fid= localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    var category = "repay";
    var content = '';
    $.post("http://localhost:80/Finment/repaydetails.php",{fid:fid,email:email,category:category},function(data){
        var json = jQuery.parseJSON(data); 
        var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td class="text-right">' + json[i].amountrepay + '</td>';
            content += '<td class="text-right">' + json[i].totrepay + '</td>';
            content += '<td class="text-right">' + json[i].rapproval + '</td>';
            content += '</tr>';
            }
        $("#tblbody6").html(content);
    }); 
});

$(document).on('click','.balancedeyails-btn',function(event){
   $("#balancedetails").modal();
    var fid= localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    var content = '';
    $.post("http://localhost:80/Finment/clientbal.php",{fid:fid,email:email},function(data){
        var json = jQuery.parseJSON(data); 
        var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td class="text-right">' + json[i].totrequested + '</td>';
            content += '<td class="text-right">' + json[i].interestrate + '</td>';
            content += '<td class="text-right">' + json[i].totrepay + '</td>';
            content += '<td class="text-right">' + json[i].category + '</td>';
            content += '</tr>';
            }
        $("#tblbody7").html(content);
    }); 
});

$(document).on('click','.interestdetails-btn',function(event){
   $("#interestdetails").modal();
    var fid= localStorage.getItem("fid");
    var email = localStorage.getItem("email");
    
    var content = '';
    $.post("http://localhost:80/Finment/clientbal.php",{fid:fid,email:email},function(data){
        var json = jQuery.parseJSON(data); 
        var len = Object.keys(json).length;
            for(var i=0;i<(len-2);i++){
                if(json[i].totrequested==null){
                   var interest = ((balance*2.50)/100);
                }else
                    var interest= ((json[i].totrequested*2.50)/100);
            content += '<tr>';
            content += '<td>' + json[i].created_at + '</td>';
            content += '<td class="text-right">' + json[i].totrequested +'Rs/-' + '</td>';
            content += '<td class="text-right">' + '2.5 Rs/-' + '</td>';
            content += '<td class="text-right">' + json[i].totrepay + '</td>';
            content += '<td class="text-right">' + interest + 'Rs/-' + '</td>';
            content += '</tr>';
            }
        $("#tblbody8").html(content);
    }); 
});
