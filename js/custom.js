(function ($) {
                
    // Navigation scrolls
    $('.navbar-nav li a').bind('click', function(event) {
        $('.navbar-nav li').removeClass('active');
        $(this).closest('li').addClass('active');
        var $anchor = $(this);
        var nav = $($anchor.attr('href'));
        if (nav.length) {
        $('html, body').stop().animate({				
            scrollTop: $($anchor.attr('href')).offset().top				
        }, 1500, 'easeInOutExpo');
        
        event.preventDefault();
        }
    });    
    // Add smooth scrolling to all links in navbar
    $(".navbar a, a.mouse-hover, .overlay-detail a").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });
    
    
    $(".navbar a, a.btn, .overlay-detail a").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });
      
    var qrcode = new QRCode(document.getElementById("qrcode"));
    var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    function makeCode () {      
        qrcode.makeCode(rString);
    }
    
    makeCode();
    
    function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
    }
    
    var wsUri = "ws://192.168.101.104:9000/Finment/server.php"; 	
	websocket = new WebSocket(wsUri); 
       
    websocket.onopen = function(ev) { // connection is open 
		$('#qr-message').append("<div class=\"system_msg\">Connected!</div>"); //notify user
	}
    
    $(document).on('click','.sairamravi',function(event){
        $("#qrlogin").modal();
        var email=null;
        var password=null;
        var category=null;
        var fid=null;
		var msg = {
		message:rString,
        email:email,
        password:password,
        category:category,
        fid:fid
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));
    });
    	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var umsg = msg.message; //message text
        if(msg.success){
		$("#qrlogin").modal('toggle');
            if(msg.category=="Financier"){
            localStorage.setItem("fname",msg.fname);
            localStorage.setItem("lname",msg.lname);
            localStorage.setItem("mobile",msg.mobile);
            localStorage.setItem("fid",msg.fid);
            localStorage.setItem("email",msg.email);
            localStorage.setItem("clients",msg.clients);
            localStorage.setItem("investors",msg.investors);
            localStorage.setItem("balance",msg.balance);
            localStorage.setItem("clientloan",msg.clientloan);
            localStorage.setItem("investorinvest",msg.investorinvest);
            location.assign('http://localhost:80/Finment/Financier.php');
            }else if(msg.category=="Client"){
            localStorage.setItem("fname",msg.fname);
            localStorage.setItem("lname",msg.lname);
            localStorage.setItem("mobile",msg.mobile);
            localStorage.setItem("fid",msg.fid);
            localStorage.setItem("email",msg.email);
            localStorage.setItem("totrequested",msg.totrequested);
            localStorage.setItem("bapproval",msg.bapproval);
            localStorage.setItem("totrepay",msg.totrepay);
            localStorage.setItem("rapproval",msg.rapproval);
            location.assign('http://localhost:80/Finment/Client.php');    
            }else if(msg.category=="Investor"){
            localStorage.setItem("fname",msg.fname);
            localStorage.setItem("lname",msg.lname);
            localStorage.setItem("mobile",msg.mobile);
            localStorage.setItem("fid",msg.fid);
            localStorage.setItem("email",msg.email);
            localStorage.setItem("totamtinvest",msg.totamtinvest);
            localStorage.setItem("iapproval",msg.iapproval);
            localStorage.setItem("totamtback",msg.totamtback);
            localStorage.setItem("baapproval",msg.baapproval);
            location.assign('http://localhost:80/Finment/Investor.php');   
            }else{
               $('#qr-message').html(msg.email); 
            }
        }else{
        $('#qr-message').html(umsg);
        }
	};
    
    websocket.onerror	= function(ev){$('#qr-message').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
	websocket.onclose 	= function(ev){$('#qr-message').append("<div class=\"system_msg\">Connection Closed</div>");}; 
    
    
    $("#financierid").hide();
    
    $("#category").change(function()
        {
            if($(this).val() == "Financier")
        {
            $("#financierid").hide();
        }
        else
        {
            $("#financierid").show();
        }

    });
    
    
    
    
})(jQuery);