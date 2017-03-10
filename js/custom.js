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
    function makeCode () {      
        var rString = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        qrcode.makeCode(rString);
    }
    
    makeCode();
    
    function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
    }
    
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