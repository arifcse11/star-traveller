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
                                 <h4 class="header blue lighter bigger">
                                    <i class="ace-icon fa fa-coffee green"></i>
                                    Please Enter Your Information
                                 </h4>
                                 <div class="space-6"></div>
                                 <form>
                                    <fieldset>
                                       <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="text" class="form-control" placeholder="Email" />
                                       <i class="ace-icon fa fa-envelope"></i>
                                       </span>
                                       </label>
                                       <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                       <input type="password" class="form-control" placeholder="Password" />
                                       <i class="ace-icon fa fa-lock"></i>
                                       </span>
                                       </label>
                                       <div class="space"></div>
                                       <div class="clearfix">
                                          <!-- <label class="inline">
                                          <input type="checkbox" class="ace" />
                                          <span class="lbl"> Remember Me</span>
                                          </label> -->
                                          <button type="button" class="width-35 pull-right btn btn-sm btn-primary">
                                          <i class="ace-icon fa fa-key"></i>
                                          <span class="bigger-110">Login</span>
                                          </button>
                                       </div>
                                       <div class="space-4"></div>
                                    </fieldset>
                                 </form>
                                <!--  <div class="social-or-login center">
                                    <span class="bigger-110">Or Login Using</span>
                                 </div> -->
                                 <div class="space-6"></div>
                                 <!-- <div class="social-login center">
                                    <a class="btn btn-primary">
                                    <i class="ace-icon fa fa-facebook"></i>
                                    </a>
                                    <a class="btn btn-info">
                                    <i class="ace-icon fa fa-twitter"></i>
                                    </a>
                                    <a class="btn btn-danger">
                                    <i class="ace-icon fa fa-google-plus"></i>
                                    </a>
                                 </div> -->
                              </div>
                              <!-- /.widget-main -->
                              <div class="toolbar clearfix">
                                 <div>
                                    <a href="/traveller/register" data-target="#signup-box" class="user-signup-link">
                                    I want to register
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
      
   </body>
</html><div></div>