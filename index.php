<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FINMENT</title>
      <link rel="shortcut icon" href="img/capture.png" />
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
      
  </head>
  <body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
        
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img src="img/Logo.PNG" height="60" width="140"> </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="sairamravi" id="sairamravi">QR Login</a></li>
          <li><a href="#"data-target="#loginbox" data-toggle="modal">Login</a></li>
          <li class="btn-trial"><a href="#"data-target="#financiersignup" data-toggle="modal">Free SignUp</a></li>
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
      
    <!--Modal box qr code-->
    <div class="modal fade" id="qrlogin" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                  <div id="qrcode"></div>
                
              </div>
            </div>
          </div>
            <div class="modal-footer">
          <div class="message pull-left" id="qr-message"></div>
        </div>
        </div>

      </div>
    </div>
    <!--/ Modal box qr code-->
      
      <!--Loginbox-->
    <div class="modal fade" id="loginbox" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="lclose" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                <form name="" id="loginForm" action="" method="post">
                   <div class="form-group category"><!-----Caterory-------->
                    <select  class="form-control form-element" name="category" id="category">
                        <option selected disabled hidden> SignIn as </option>
					   <option class='drop-down' value='Financier'> Financier </option>			
					   <option class='drop-down' value='Client'> Client </option>			
					   <option class='drop-down' value='Investor'> Investor</option>						
				    </select>
                    </div>
                    <div class="form-group has-feedback"> <!----- Financier ID -------------->
                      <input class="form-control financierid" placeholder="Financier ID"  id="financierid" type="text" autocomplete="off" /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control email" placeholder="email"  id="loginid" type="text" autocomplete="off" /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback" ><!----- password -------------->
                      <input class="form-control  password " placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn financierlogin-btn btn-green btn-block btn-flat" ><span class="glyphicon glyphicon-lock"></span>&nbsp; Sign In  <span id="sign11" class="glyphicon sign11"></span></button>
                          <button type="button" class="btn forgotpass btn-green btn-block btn-flat" data-dismiss="modal">Forgot Password?</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="signup-message"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Login box-->
      
    <!--forget password box-->
    <div class="modal fade" id="Forgetpassword" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Forgetpassword</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Enter your Email address</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control foremail" placeholder="Email"  id="foremail" type="text" autocomplete="off" /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <button type="button" class="btn  forpass btn-green btn-block btn-flat"><span class="glyphicon glyphicon-lock"></span>&nbsp; Password <span id="for11" class="glyphicon for11"></span></button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
               <div class="modal-footer">
          <div class="message pull-left" id="signup-message3"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ forget password box-->  
            
      <!--Financier signup-->
    <div class="modal fade" id="financiersignup" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="fregclose" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Financier's Registration</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <div class="form-group">
                <form role="form">
                 <div class="form-group has-feedback"> <!----- firstname -------------->
                      <input class="form-control fname-validation" placeholder="Firstname"  name="fname" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fname11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            
                      
                  </div>
                      <div class="form-group has-feedback"> <!----- lastname -------------->
                      <input class="form-control lname-validation form-element" placeholder="Lastname"  name="lname" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="lname11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- email -------------->
                      <input class="form-control email-validation form-element" placeholder="E-Mail"  name="email" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="email11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                     
                  </div>
                    
                  <div class="form-group  has-feedback"><!----- password -------------->
                      <input class="form-control fpsw-validation form-element" placeholder="Password" name="fpsw" type="password" autocomplete="off" /><span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fpsw11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group  has-feedback"> <!----- confirm password -------------->
                      <input class="form-control fcpsw-validation form-element" placeholder="Confirm Password"  name="fcpsw" type="password" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fcpsw11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- mobile no -------------->
                      <input class="form-control mobile-validation form-element" placeholder="Mobile No"  name="mobile" type="tel"  autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="mobile11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- aadhar -------------->
                      <input class="form-control aadhar-validation form-element" placeholder="Aadhar Card No"  name="aadhar" type="textbox" autocomplete="off" /><span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="aadhar11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- PAN no -------------->
                      <input class="form-control pan-validation form-element" placeholder="Pan No"  name="panid" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="pan11" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                  <div class="row">
                      <div class="col-xs-12">
                          
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn btn-green btn-block btn-flat signup-btn"><span class="glyphicon glyphicon-lock"></span>&nbsp; Register <span id="register11" class="glyphicon register11"></span></button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="signup-message1"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Financier signup-->
          
    <!--Banner-->
    <div class="banner">
      <div class="bg-color">   
        <div class="container">
          <div class="row">    
            <div class="banner-text text-center">
              <div class="text-border">
                <h2 class="text-dec">Trust & Money</h2>
              </div>
              <div class="intro-para text-center quote">
                <p class="big-text">Invest Today . . . Earn Tomorrow.</p>
                <p class="small-text">Maintain a easy and hassle free financial service</p>
                <a href="#organisations" class="btn">Financial Management</a>
              </div>
              <a href="#feature" class="mouse-hover"><div class="mouse"></div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Banner-->

          
    <!--Feature-->
    <section id ="feature" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Features</h2>
            <p>Business has changed. You are being pushed to provide even more information to support strategic decision making: accurate, timely reports on financial performance, operating costs, and period-end management reporting. To do that you need to transform your finance function, shifting resources from manual processing and control to being a better business partner. All at lower cost too.</p>
            <hr class="bottom-line">
          </div>
          <div class="feature-info">
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Automation</h4>
                  <p>Every Transaction made to client and investor,every Transaction based on time can be automated.The slow, manual approach frequently results in dirty data contaminating the financials, subsidiaries closing often late or incomplete, and departmental managers frequently pointing out errors in reports. </p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Time Variant</h4>
                    <p>The data collected in a database is identified with a particular time period. The data in a database provides information from the historical point of view.This data is used to analyse and send notifications through mailing system and also through Messages<font>*</font>.</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-calendar fa-spin fa-3x fa-fw r"></i>
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Non- volatile</h4>
                  <p>This means the previous data is not erased when new data is added to it. A Transactional database is kept separate from the operational database and therefore frequent changes in operational database is reflected in the transaction database but never deleted from database.</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-eraser fa-spin fa-3x fa-fw "></i>
                </div>
              </div>
            </div>
              
        </div>
        </div>
      </div>
    </section>
    <!--/ feature-->
          
          
    <!--Organisations-->
    <section id ="organisations" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">         
              <div class="orga-stru">
                <h3>40%</h3>
                <p>Say NO!!</p>
                <i class="fa fa-male"></i>
              </div>  
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">         
              <div class="orga-stru">
                <h3>50%</h3>
                <p>Says Yes!!</p>
                <i class="fa fa-male"></i>
              </div>  
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">         
              <div class="orga-stru">
                <h3>10%</h3>
                <p>Can't Say!!</p>
                <i class="fa fa-male"></i>
              </div>  
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-info">
              <hgroup>
                <h3 class="det-txt"> IS THIS AUTOMATED MANAGEMENT REQUIRED NOW?</h3>
                <h4 class="sm-txt">(Revised and Updated for 2017)</h4>
              </hgroup>
              <p class="det-p">Does month or quarter end go smoothly every period? Do you have enough time to analyze in detail and provide forward looking guidance before publication? Can you see at a glance the state of your financial feed and processes?</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Organisations-->
          
    <!--Faculity member-->
    <section id="faculity-member" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Meet Our Developers</h2>
            <p>Resolve General issues in general way, Making things easier than before.<br>Grow in career</p>
            <hr class="bottom-line">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="pm-staff-profile-container" >
              <div class="pm-staff-profile-image-wrapper text-center">
                <div class="pm-staff-profile-image">
                  <img src="img/mentor.jpg" alt="" class="img-thumbnail img-circle" />
                </div>   
              </div>                                
              <div class="pm-staff-profile-details text-center">  
                <p class="pm-staff-profile-name">Varun J Shah</p>
                <p class="pm-staff-profile-title">Lead Software Engineer</p>
                
                <p class="pm-staff-profile-bio">GREAT</p>
              </div>     
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="pm-staff-profile-container" >
              <div class="pm-staff-profile-image-wrapper text-center">
                <div class="pm-staff-profile-image">
                  <img src="img/mentor.jpg" alt="" class="img-thumbnail img-circle" />
                </div>   
              </div>                                
              <div class="pm-staff-profile-details text-center">  
                <p class="pm-staff-profile-name">Kolluru Sairam Ravi</p>
                <p class="pm-staff-profile-title">Lead Software Developer</p>
                <p class="pm-staff-profile-bio">Awesome </p>
              </div>     
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="pm-staff-profile-container" >
              <div class="pm-staff-profile-image-wrapper text-center">
                <div class="pm-staff-profile-image">
                    <img src="img/mentor.jpg" alt="" class="img-thumbnail img-circle" />
                </div>   
              </div>                                
              <div class="pm-staff-profile-details text-center">  
                <p class="pm-staff-profile-name">SRINIVAS</p>
                <p class="pm-staff-profile-title">Lead Software Engineer</p>
                
                <p class="pm-staff-profile-bio">BORED </p>
              </div>     
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Faculity member-->
               
          
    <!--Contact-->
    <section id ="contact" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Contact Us</h2>
            <p></p>
            <hr class="bottom-line">
          </div>
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
              <div class="col-md-6 col-sm-6 col-xs-12 left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control form" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-12 right">
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-xs-12">
                <!-- Button -->
                <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">SEND EMAIL</button>
              </div>
          </form>
          
        </div>
      </div>
    </section>
    <!--/ Contact-->
          
          
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">

      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
        ©2016 SAIRAM RAVI. All rights reserved
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
            -->
            Designed by <a href="https://bootstrapmade.com/">SAIRAM RAVI</a>
        </div>
      </div>
    </footer>
    <!--/ Footer-->
          
    
    <script type="text/javascript" src="js/qrcode.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/validations.js"></script>
    <script src="contactform/contactform.js"></script>
    
  </body>
</html>