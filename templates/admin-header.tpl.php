<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Star Traveller Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

		
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="/traveller/welcome" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Star Traveller
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				

				 <ul class="nav nav-list">
               <li class="active">
                  <a href="/traveller/welcome">
                  <i class="menu-icon fa fa-tachometer"></i>
                  <span class="menu-text"> Dashboard </span>
                  </a>
                  <b class="arrow"></b>
               </li>
               <li class="">
                  <a href="/traveller/myprofile">
                  <i class="menu-icon fa fa-user-circle"></i>
                  <span class="menu-text">
                  My Profile
                  </span>
                  </a>
               </li>
               <li class="">
                  <a href="/traveller/mystory">
                  <i class="menu-icon fa fa-book"></i>
                  <span class="menu-text">
                  My Stories
                  </span>
                  </a>
               </li>
               <li class="">
                  <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-cloud-upload"></i>
                  <span class="menu-text"> Submit New Story </span>
                  <b class="arrow fa fa-angle-down"></b>
                  </a>
                  <b class="arrow"></b>
                  <ul class="submenu">
                     <li class="">
                        <a href="/traveller/story-bangladesh">
                        <i class="menu-icon fa fa-caret-right"></i> Story About Bangladesh
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/traveller/story-world">
                        <i class="menu-icon fa fa-caret-right"></i> Story About World
                        </a>
                        <b class="arrow"></b>
                     </li>
                  </ul>
               </li>
               <li class="">
                  <a href="#">
                  <i class="menu-icon fa fa-caret-square-o-right"></i>
                  <span class="menu-text">
                  Visit Main Site
                  </span>
                  </a>
               </li>
               <li class="">
                  <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-power-off"></i>
                  <span class="menu-text">
                  Logout
                  </span>
                  </a>
               </li>
            </ul>