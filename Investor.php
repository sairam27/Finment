<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FINMENT-INVESTOR</title>
      <link rel="shortcut icon" href="img/capture.png" />
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/investorstyles.css">
      <style>


.img-structure{
  width:32px;
  height: 32px;
}

.img-rounded{
  border-radius: 50%;
}

.navbar{
  border-radius:0px;
  margin-bottom: 0px;
  height:60px;
}

.modal-header, h4, .close {
    color:black !important;
    text-align: center;
    font-size: 30px;
}


@media(min-width: 992px){
    nav.navbar{
        top:0px;
    }

    #photo-upload-modal .modal-dialog {
      width: 900px;
      margin: 30px auto;
    }
}




@media (min-width:768px){
  .mobile{
    display: none;
  }

  .desktop{
    display: inline;
  }
}
@media (max-width:767px){
  .mobile{
    display: inline;
  }

  .desktop{
    display: none !important; /*important, as the image would display on the collapse dropdown as well*/
  }
}

@media (min-width:768px) and (max-width:991px){
    #photo-upload-modal .modal-dialog {
      width: 700px;
      margin: 30px auto;
    }
}
          .btn-green, .btn-green:hover{
    background-color: #5fcf80;
    color: #fff;
}
          .modal-dialog {
    width: 600px;
    margin: 150px auto;
}
.modal-sm {
    width: 300px;
    }
.modal-content h4 {
    font-size: 0.5em;
    font-weight: 700;
}

</style>
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
            <ul>
        <li class="navbar-brand mobile"><a href="#">
              <img src="img/default.gif" alt="profile photo" class="profile-photo img-structure img-rounded"/>
          </a></li>
        </ul> 
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav ">
        <li class="btn-trial1 "><a href="#"> INVESTOR </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
              <li class="btn-trial"><a href="#" data-target="#newinvest" data-toggle="modal" >New Investment</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>  &nbsp; Profile Settings <b class="caret"></b></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li><a href="#" data-target="#editprof" data-toggle="modal">Edit Profile</a></li>
                     <li><a href="#" data-target="#chanpass" data-toggle="modal">Change Password</a></li>
                </ul>
                <li class="btn-trial logout-btn"><a href="#">Logout</a></li>
                <li class="desktop"><a href="#" data-target="#photo-upload-modal" data-toggle="modal">
                    <?php 
                        /* Load the profile.jpg/png if present. otherwise, load the logo*/
                        if(file_exists('img/default.gif')){
                            $image = 'img/default.gif';
                        }else if(file_exists('img/default.gif')){
                            $image = 'img/default.gif';
                        }else{
                            #Load Default Logo
                            $image = "img/default.gif";
                        }
                    ?>
              <img src=<?php echo $image ?> id="profile-photo" alt="profile photo" class="profile-photo img-structure img-rounded"/>
                    </a></li>
            </ul>
                
          </div>
        </div>
    </nav>
<!--/ Navigation bar-->
        
<!-- Photo upload Modal -->
<div class="modal fade" id="photo-upload-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header background-maroon" style="padding:35px 50px;color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-camera"></span> Upload Photo</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
              <?php include 'photo_crop.html';?>
        </div>
      </div>
      
    </div>
  </div>
<!--/ photo upload modal -->
 
<!--Pricing-->
<section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Analysis</h2>
            <p>An investor is any person who commits capital with the expectation of financial returns. Investors utilize investments in order to grow their money and/or provide an income during retirement, such as with an annuity.</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h2>Investments</h2>
               <span class="fa fa-inr curency"></span> <span class="amount invested">0</span> 
              </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg1 green btn-block">Details</a> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="#" class="btn btn-bg green btn-block" data-target="#amtbackmodal" data-toggle="modal">Withdraw Amount</a> 
              </div>
            </div>
            </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h2>Interest Earned</h2>
             <span class="fa fa-inr curency"></span><span class="amount">0</span> 
              </div>
                 <div class="row">
                <div class="col-xs-12">
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg1 green btn-block">Details</a> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="#" class="btn btn-bg green btn-block">Summary</a> 
              </div>
            </div>
            </div>
            </div>
          </div>
            
            
            
            <div class="col-md-6 col-sm-6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h2>Balance Amount</h2>
             <span class="fa fa-inr curency"></span><span class="amount">0</span> 
              </div>
          
              <!-- Plean Detail -->
               <div class="row">
                <div class="col-xs-12">
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg1 green btn-block">Details</a> 
              </div>
            </div>
            </div>
            </div>
          </div>
            
            <div class="col-md-6 col-sm-6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h2>Tax Amount</h2>
                <span class="fa fa-inr curency"></span><span class="amount">0</span> 
              </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg1 green btn-block">Details</a> 
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--/ Pricing--> 

<!--chan pass-->
<div class="modal fade" id="chanpass" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Change Password</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"><!-----previous password -------------->
                      <input class="form-control prevfpsw" placeholder="Previous Password" id="prevfpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!-----new password -------------->
                      <input class="form-control newfpsw" placeholder="New Password" id="newfpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                  </div>
                    <div class="form-group has-feedback "><!-----confirmnew password -------------->
                      <input class="form-control confnewfpsw" placeholder="Confirm Password" id="confnewfpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > I am sure
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn chanpass-btn btn-green btn-block btn-flat">Save</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="change-message"></div>
        </div>
          </div>
        </div>
      </div>
    </div>
<!--/chan pass-->
        
<!--new investment-->
<div class="modal fade" id="newinvest" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Add funds to finance</h4>
          </div>
          <div class="modal-body padtrbl">
            <div class="login-box-body">
              <p class="login-box-msg">Request Investment with Financier</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control fund" placeholder="Amount"  id="loginid" type="text" autocomplete="off"/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="fa fa-inr form-control-feedback"></span>
                  </div>
                    <div class="form-group has-feedback"> <!----- interestrate -------------->
                      <input class="form-control interestrate" placeholder="Amount"  id="interestrate" type="text" autocomplete="off" readonly value="1.50ps/100Rs/Month"/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="fa fa-inr form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="sure">yes Iam sure.
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn newinvest-btn btn-green btn-block btn-flat"> Request Investment <span id="register15" class="glyphicon register15"></span></button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="signup-message5"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
<!--/new investment-->
        
<!--repay-->
<div class="modal fade" id="amtbackmodal" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Request funds back</h4>
          </div>
          <div class="modal-body padtrbl">
            <div class="login-box-body">
              <p class="login-box-msg">Request Money From Financier</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control amtback" placeholder="Amount" type="text" autocomplete="off"/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="fa fa-inr form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="sure">yes Iam sure.
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn amtback-btn btn-green btn-block btn-flat"> Request Money <span id="register16" class="glyphicon register16"></span></button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="signup-message6"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
<!--/repay-->        
        
<!--editprofile-->
<div class="modal fade" id="editprof" role="dialog">
<div class="modal-dialog modal-sm">
      
<!-- Modal content no 1-->
<div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Edit profile</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Edit Your Details</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!-----first username -------------->
                      <input class="form-control cfname-validation" placeholder="First Name"  id="chanfname" type="text" autocomplete="off" readonly /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                    <div class="form-group has-feedback"> <!-----last username -------------->
                      <input class="form-control clname-validation" placeholder="Last Name"  id="chanlname" type="text" autocomplete="off" readonly /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                    <div class="form-group has-feedback"> <!----- mobile -------------->
                      <input class="form-control cmobile-validation" placeholder="Mobile"  id="chanmobile" type="text" autocomplete="off" readonly/> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > I am sure
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <button type="button" class="btn editprof-btn btn-green btn-block btn-flat">edit</button>
                      </div>
                      <div class="col-xs-6">
                          <button type="button" class="btn editprof-btnsave btn-green btn-block btn-flat">Save</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="modal-footer">
          <div class="message pull-left" id="editprof-message"></div>
        </div>
          </div>
        </div>

      </div>
    </div>
<!--/ editprofile-->        
        
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/investorvalid.js"></script>
    <script src="contactform/contactform.js"></script>
    </body>
</html>