<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta charset="utf-8" />
      <title>Login Page - Star Traveller</title>
      <meta name="description" content="User login page" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <!-- bootstrap & fontawesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

      
      <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

      
      <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

   </head>
   <body class="login-layout light-login">
      <div class="main-container">
         <div class="main-content">
            <div class="row">
               <div class="col-sm-10 col-sm-offset-1">
                  <div class="login-container">
                     <div class="center">
                        <h1>
                           <i class="ace-icon fa fa-leaf green"></i>
                           <span class="red">Star</span>
                           <span class="white" id="id-text2">Traveller</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; The Daily Star</h4>
                     </div>
                     <div class="space-6"></div>
                     <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                           <div class="widget-body">
                              <div class="widget-main">
                                 <h4 class="header green lighter bigger">
                                    <i class="ace-icon fa fa-users blue"></i>
                                    New User Registration
                                 </h4>
                                 <div class="space-6"></div>
                                 <p> Enter your details to begin: </p>
                                 <form>
                                    <fieldset>
                                      <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="text" class="form-control" placeholder="Full Name" />
                                       <i class="ace-icon fa fa-user"></i>
                                       </span>
                                       </label>
                                       <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="email" class="form-control" placeholder="Email" />
                                       <i class="ace-icon fa fa-envelope"></i>
                                       </span>
                                       </label>
                                     
                                       <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                                       <i class="ace-icon fa fa-lock"></i>
                                       </span>
                                       </label>
                                       <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Repeat password" onkeyup="checkPass(); return false;" />
                                       <i class="ace-icon fa fa-retweet"></i>
                                       </span>
                                       <span id="confirmMessage" class="confirmMessage"></span>
                                       </label>
                                       <div class="space-24"></div>
                                       <div class="clearfix">
                                          <button type="reset" class="width-30 pull-left btn btn-sm">
                                          <i class="ace-icon fa fa-refresh"></i>
                                          <span class="bigger-110">Reset</span>
                                          </button>
                                          <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                          <span class="bigger-110">Register</span>
                                          <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                          </button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                              <div class="toolbar clearfix">
                                 <div>
                                    <a href="/traveller/login" data-target="#signup-box" class="user-signup-link">
                                    Back to login
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <!-- /.widget-body -->
                        </div>
                       
                       
                     </div>
                     
                  </div>
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.main-content -->
      </div>
      <!-- /.main-container -->
      <!-- basic scripts -->
      <!--[if !IE]> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <!-- <![endif]-->
      <!--[if IE]>
      <script src="assets/js/jquery-1.11.3.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
      </script>

      <script>
         function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('password');
    var confirm_password = document.getElementById('confirm_password');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirm_password.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirm_password.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirm_password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
      </script>
      
   </body>
</html><div></div>