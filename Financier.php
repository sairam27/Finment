<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FINMENT-FINANCIER</title>
      <link rel="shortcut icon" href="img/capture.png" />
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/financierstyles.css">
<style>
/******* State Properties ********/
.is-hidden{
	display:none;
}

.is-invisible{
	visibility: hidden;
}

.is-visited{
	background:#f5f5f5;
	color: #16a085;
}

.is-unvisited{
	background:#f5f5f5;
}

.is-active{
	background: #16a085;
	color: white;
}

.is-disabled {
 	pointer-events: none;
 	cursor: default;
}

.min-btn-padding{
	padding:4px 8px;
}

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

.modal-head, h4, .close {
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
    
/***********************************
Price Table
************************************/
.price-table {
    border-radius: 140px;
    box-shadow: 0px 0px 1px 0px RGBA(0, 0, 0, 0.4);
    position: relative;
}
.price-table .pricing-head {
    background: #fff;
    padding: 40px;
    text-align: center;
}
.price-table .pricing-head h4 {
    font-size: 22px;
    color: #232c3b;
    margin-top: 0px;
    letter-spacing: 1px;
    border-bottom: 1px solid #232c3b;
    padding-bottom: 20px;
}
.pricing-head .amount {
    font-size: 60px;
    font-weight: bold;
}
.pricing-head .curency {
    display: inline-block;
    position: relative;
    top: -30px;
    font-size: 20px;
}
.price-in {
    background: #fff;
    text-align: center;
}
.btn-bg {
   border: 0px;
    border-radius: 0px;
    color: #fff !important;
    padding: 20px 0px;
    width: inherit;  height: 3em;
    text-align: center;
    font-weight: bold !important;
    font-size: 14px;
    background-color: #5fcf80;
    line-height: 5px; /* <- changed this */
    border-radius: 25px;
}
.btn-bg1 {
   border: 0px;
    border-radius: 0px;
    color: #fff !important;
    width: inherit;  height: 3em;
    font-weight: bold !important;
    font-size: 14px;
    background-color:cadetblue;
    line-height: 27px; /* <- changed this */
    border-radius: 25px;
}
    .sairam{
        width: 800px;
        height: 800px;
    }   
    
    .earnings-btn{
        background-color: darkturquoise;
    }
    .taximg{
        width: 570px;
        height:inherit;
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
        <a class="navbar-brand" href="#"><img src="img/Logo.PNG" height="60" width="140"> </a>
             <ul>
        <li class="navbar-brand mobile"><a href="#">
              <img src="img/default.gif" alt="profile photo" class="profile-photo img-structure img-rounded"/>
          </a></li>
        </ul> 
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav ">
        <li class="btn-trial1"><a href="#"> Financier </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <li><a href="#" class="investorrequest-btn"> Investors</a></li>
          <li><a href="#" class="clientrequest-btn"> Clients  </a></li>
             <li><a href="#"data-target="#addfunds" data-toggle="modal"> Add funds  </a></li>
            <li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile Settings <b class="caret"></b></a>
				  <ul class="dropdown-menu ">
				    <li><a href="" data-target="#editprof" data-toggle="modal">Edit Profile</a></li>
					<li><a href="" data-target="#chanpass" data-toggle="modal">Change Password</a></li>
				  </ul>
            </li>
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
        
<!--Pricing-->
<section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Analysis</h2>
            <p>The finance controller prepares an ongoing analysis of the finances's financial results, particularly in relation to a number of operational metrics that are not seen by outside entities (such as Interest rate, amount distribution channel, profit from clients, and so forth).</p>
            <hr class="bottom-line">
          </div>
            <div class="col-md-12 col-sm-12">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>Interest earned</h4>
             <span class="fa fa-inr curency"></span><span class="amount earningsamount">0</span><span>Rupees/month</span> 
              </div>
                <div class="price-in mart-15">
                  
                <a class="btn earnings-btn btn-bg1 green btn-block"></a> 
                    <div>
                    
                    </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>Clients</h4>
                <span class="amount" id="noofclients" >0</span> 
              </div>
                <div class="price-in mart-15">
                  
                <a href="#" class="btn clientdetails-btn btn-bg1 green btn-block">Details</a> 
              </div>
                <br>
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="#" class="btn btn-bg green btn-block" data-target="#clientadd" data-toggle="modal">Add Clients</a>  
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm6">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>Investors</h4>
             <span class="amount" id="noofinvestors">0</span> 
              </div>
                <div class="price-in mart-15">
                <a href="#" class="btn investordetails-btn btn-bg1 green btn-block">Details</a> 
              </div>
                
          <br>
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="#" class="btn btn-bg green btn-block" data-target="#investoradd" data-toggle="modal">Add Investors</a> 
              </div>
            </div>
          </div>
            <br>
            
            
            <div class="col-md-12 col-sm-12">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>Amount available</h4>
             <span class="fa fa-inr curency"></span><span class="amount balanceamount">0</span><span>Rupees</span> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="#" class="btn btn-bg1 balancedetails-btn green btn-block">Balance Statement</a> 
              </div>
                <br>
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg taxdetails-btn yellow btn-block">Tax Details(earned from clients)</a> 
              </div>
            </div>
          </div>

            
            
         
        </div>
      </div>
    </section>
<!--/ Pricing-->
        
<!--Clents details-->
<div class="modal fade" id="clientdetails" >
      <div class="modal-dialog modal-sm">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Your Clients</h3>
        </div>
        <div class="modal-body">
          <table class="table clientstable table-striped" id="clientstable">
            <thead id="tblHead">
              <tr>
                  
                <th>Clients</th>
                <th>mobile</th>
                <th>email</th> 
                <th><input type="checkbox" /></th>
              </tr>
            </thead>
            <tbody id="tblbody">
                
            </tbody>
          </table>
          <div class="form-group">
            <input type="button" class="btn btn-warning btn-sm pull-right deleteclient" value="Delete">
            <div class="clearfix"></div>
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
             <div class="modal-footer">
          <div class="message pull-left" id="signup-message9"></div>
        </div>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/Client requests--> 
    
<!--Investor details-->
<div class="modal fade" id="investordetails" >
      <div class="modal-dialog modal-sm">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Your Investors</h3>
        </div>
        <div class="modal-body">
          <table class="table table-striped" id="tblGrid7">
            <thead id="tblHead">
              <tr>
                <th>Investors</th>
                <th>Mobile</th>
                <th class="text-right">Email</th> 
                <th><input type="checkbox" /></th>
              </tr>
            </thead>
            <tbody id="tblbody2">
              
              
            </tbody>
          </table>
          <div class="form-group">
            <input type="button" class="btn btn-warning btn-sm pull-right deleteinvestor" value="Delete">
            <div class="clearfix"></div>
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
              <div class="modal-footer">
          <div class="message pull-left" id="signup-message20"></div>
        </div>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/Client details-->    
    
<!--Balance details-->
<div class="modal fade" id="balancedetails" >
      <div class="modal-dialog modal-sm">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Balance Statement</h3>
        </div>
        <div class="modal-body">
          <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr> 
                <th>DATE</th>  
                <th class="text-right">Credit</th>
                <th class="text-right">Debit</th>
                <th class="text-right">Total</th>  
              </tr>
            </thead>
            <tbody id="tblbody3">
              
              
            </tbody>
          </table>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/Balance details-->  

<!--Tax details-->
<div class="modal fade" id="taxdetails" >
      <div class="modal-dialog modal-sm">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div>
          <img src="img/Capture2.PNG" class="taximg"/>
          </div>
          <h3 class="modal-title">Tax details</h3>
        </div>
        <div class="modal-body">
          <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Date</th>  
                <th>email</th>
                <th>interestearned</th>
                <th>Tax amount </th>  
              </tr>
            </thead>
            <tbody id="tblbody15">
              
              
            </tbody>
          </table>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button> 
          <div class="message pull-left" id="tax-message"></div>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/Tax details-->   
    
<!--clientadd-->
<div class="modal fade" id="clientadd" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="fregclose1" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Clients Registration</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <div class="form-group">
                <form role="form" id="myclientForm">
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
                          <button type="button" class="btn btn-green btn-block btn-flat signupclient-btn"><span class="glyphicon glyphicon-lock"></span>&nbsp; ADD CLIENTS <span id="register11" class="glyphicon register11"></span></button>
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
<!--/ clientadd-->
        
<!--investoradd-->
<div class="modal fade" id="investoradd" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="fregclose2" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Investors Registration</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <div class="form-group">
                <form role="form" id="myinvestorForm">
                 <div class="form-group has-feedback"> <!----- firstname -------------->
                      <input class="form-control fname-validation1" placeholder="Firstname"  name="fname" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fname12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            
                      
                  </div>
                      <div class="form-group has-feedback"> <!----- lastname -------------->
                      <input class="form-control lname-validation1 form-element" placeholder="Lastname"  name="lname" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="lname12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- email -------------->
                      <input class="form-control email-validation1 form-element" placeholder="E-Mail"  name="email" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="email12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                     
                  </div>
                    
                  <div class="form-group  has-feedback"><!----- password -------------->
                      <input class="form-control fpsw-validation1 form-element" placeholder="Password" name="fpsw" type="password" autocomplete="off" /><span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fpsw12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group  has-feedback"> <!----- confirm password -------------->
                      <input class="form-control fcpsw-validation1 form-element" placeholder="Confirm Password"  name="fcpsw" type="password" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="fcpsw12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- mobile no -------------->
                      <input class="form-control mobile-validation1 form-element" placeholder="Mobile No"  name="mobile" type="tel"  autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="mobile12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- aadhar -------------->
                      <input class="form-control aadhar-validation1 form-element" placeholder="Aadhar Card No"  name="aadhar" type="textbox" autocomplete="off" /><span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="aadhar12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                      <div class="form-group has-feedback"> <!----- PAN no -------------->
                      <input class="form-control pan-validation1 form-element" placeholder="Pan No"  name="panid" type="textbox" autocomplete="off" /> <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span id="pan12" class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                      
                  </div>
                    
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="col-xs-12">
                          <button type="button" class="btn btn-green btn-block btn-flat signupinvestor-btn"><span class="glyphicon glyphicon-lock"></span>&nbsp; ADD INVESTORS <span id="register12" class="glyphicon register12"></span></button>
                      </div>
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
<!--/ investoradd--> 
    
<!--Clent Requests-->
<div class="modal fade" id="clientrequest" >
      <div class="modal-dialog modal-sm ">
      <div class="modal-dialog sairam">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Client Requests</h3>
        </div>
        <div class="modal-body">
		  <h5 class="text-center">Approve Client Requests.</h5>
          <table class="table table-striped" id="tblGrid1">
            <thead id="tblHead">
              <tr>
                <th>Clients</th>
                <th>Amount request</th>
                <th>Interestrate</th>  
                <th>Amount payback</th> 
                <th>Approval</th>
              </tr>
            </thead>
            <tbody id=tblbody4>
              
              
            </tbody>
          </table>
          <div class="form-group">
              <button type="button" class="btn btn-warning btn-approve btn-sm pull-right">Aprrove <span id="clapprove" class="glyphicon clapprove"></span></button>
            <div class="clearfix"></div>
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>

          <div class="message pull-left" id="signup-message8"></div>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/Client requests-->
    
<!--Investor requests-->
<div class="modal fade" id="investorrequest" >
      <div class="modal-dialog modal-sm">
      <div class="modal-dialog sairam">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Investor Requests</h3>
        </div>
        <div class="modal-body">
		  <h5 class="text-center">Approve Investor Requests.</h5>
          <table class="table table-striped" id="tblGrid2">
            <thead id="tblHead">
              <tr> 
                <th>Investor</th>
                <th>Amount invest</th>
                <th>Interestrate</th> 
                <th>Amount back</th>  
                <th>Approval</th>  
              </tr>
            </thead>
            <tbody id="tblbody5">
              
              
            </tbody>
          </table>
          <div class="form-group">
              <button type="button" class="btn iapproval-btn btn-warning btn-sm pull-right">Approve <span id="inapprove" class="glyphicon inapprove"></span></button>
            <div class="clearfix"></div>
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            <div class="message pull-left" id="signup-message12"></div>
        </div>
				
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
      </div>
    </div>
<!--/ Investor requests-->

<!--addfunds-->
<div class="modal fade" id="addfunds" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Add funds</h4>
          </div>
          <div class="modal-body padtrbl">
            <div class="login-box-body">
              <p class="login-box-msg">your Money Your Interest</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control fund" placeholder="Amount"  id="loginid" type="text" autocomplete="off"/>
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
                          <button type="button" class="btn addfund btn-green btn-block btn-flat"> Add fund <span id="register15" class="glyphicon register11"></span></button>
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
<!--/addfunds-->
    
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
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/envalidations.js"></script>    
    <script src="contactform/contactform.js"></script>
</body>
</html>