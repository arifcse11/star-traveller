<?php
session_start();
require './core/autoload.php';
require './core/helper.php';

$app = new \Slim\Slim();

$app->get('/welcome', function() use ($app) {
  $app->render("admin-header.tpl.php");
  $app->render("welcome.tpl.php");
  $app->render("admin-footer.tpl.php");
});

$app->get('/myprofile', function() use ($app) {
  $app->render("admin-header.tpl.php");
  $app->render("myprofile.tpl.php");
  $app->render("admin-footer.tpl.php");
});

$app->get('/mystory', function() use ($app) {
  $app->render("admin-header.tpl.php");
  $app->render("mystory.tpl.php");
  $app->render("admin-footer.tpl.php");
});


$app->get('/story-bangladesh', function() use ($app) {
  $app->render("admin-header.tpl.php");
  $app->render("story-bangladesh.tpl.php");
  $app->render("admin-footer.tpl.php");
});

$app->get('/story-world', function() use ($app) {
  $app->render("admin-header.tpl.php");
  $app->render("story-world.tpl.php");
  $app->render("admin-footer.tpl.php");
});


$app->get('/register', function() use ($app) {
  $app->render("register.tpl.php");
});


$app->get('/login', function() use ($app) {
  $app->render("login.tpl.php");
});



$app->get('/travel', function() use ($app) {

  // $app->render("header.tpl.php");
  // $app->render("about.tpl.php" , array('items' => $items));
  $app->render("travel.tpl.php");
});


$app->get('/travel-bangladesh', function() use ($app) {

  // $app->render("header.tpl.php");
  // $app->render("about.tpl.php" , array('items' => $items));
  $app->render("travel-bangladesh.tpl.php");
});


$app->post('/travel-bangladesh', function () use ($app) {
  if($app->request->isPost()) {
    $msg = post_validate($app);
    if($msg) {
      $app->flashNow('error', $msg);
      // $app->render("header.tpl.php");
      $app->render("travel-bangladesh.tpl.php", array('data' => $app->request->post()));
      // $app->render("footer.tpl.php");
    } else {
      post_data_save();
      $app->flash('info', '<p class="colorgreen text-center">Registered Successfully.</p>');
      $app->response->redirect('travel-bangladesh');
    }
  }
});


$app->get('/about', function() use ($app) {

 $items = get_data(3, 0);
  $app->render("header.tpl.php");
  $app->render("about.tpl.php" , array('items' => $items));
  $app->render("footer.tpl.php");
});

$app->get('/register', function() use ($app) {

 
  $app->render("header.tpl.php");
  $app->render("register.tpl.php");
  $app->render("footer.tpl.php");
});


$app->post('/register', function () use ($app) {
  if($app->request->isPost()) {
    $msg = post_validate($app);
    if($msg) {
      $app->flashNow('error', $msg);
      $app->render("header.tpl.php");
      $app->render("register.tpl.php", array('data' => $app->request->post()));
      $app->render("footer.tpl.php");
    } else {
      post_data_save();
      $app->flash('info', '<p class="colorgreen text-center">Registered Successfully.</p>');
      $app->response->redirect('register');
    }
  }
});


$app->post('/travel-bangladesh', function () use ($app) {
  if($app->request->isPost()) {
    $msg = post_validate($app);
    if($msg) {
      $app->flashNow('error', $msg);
      // $app->render("header.tpl.php");
      $app->render("travel-bangladesh.tpl.php", array('data' => $app->request->post()));
      // $app->render("footer.tpl.php");
    } else {
      post_data_save();
      $app->flash('info', '<p class="colorgreen text-center">Registered Successfully.</p>');
      $app->response->redirect('travel-bangladesh');
    }
  }
});


$app->get('/newsupdates', function() use ($app) {

 $items = get_news();
 $time=get_time();
 //$date_reverce=reverce();
 
  $app->render("header.tpl.php");
  $app->get('newsupdates.tpl.php', 'reverce');
  
  $app->render("newsupdates.tpl.php"  , array('items' => $items,'times' => $time));
  $app->render("footer.tpl.php");
});

$app->get('/contact', function() use ($app) {

 $items = get_data(3, 0);
  $app->render("header.tpl.php");
  $app->render("contact.tpl.php" , array('items' => $items));
  $app->render("footer.tpl.php");
});



$app->get('/details/:id', function($id) use ($app) {
//$app->get('/details', function($id) use ($app) {
  $item = get_data_single($id);
 $related = get_related_item($id);
  
  
  
  if($item) {
    $app->render("header.tpl.php", array('item' => $item));
    $app->render("details.tpl.php", array('item' => $item , 'related' => $related));
    $app->render("footer.tpl.php");
  } else {
    $app->response->redirect('/dunmun');
  }
});

/*$app->get('/university/:id', function($id) use ($app) {

	$items = get_ideas_single_university_list($id);
	$university=get_university();

    $app->render("header.tpl.php");
	$app->get('university.tpl.php', 'convertYoutube');
    $app->render("university.tpl.php" ,array('items' => $items, 'university' => $university[$id]));
    $app->render("footer.tpl.php");
});

$app->get('/universitydetails/:id', function($id) use ($app) {

	$items = get_ideas_single_university($id);
	$youtubeID =youtube_id_from_url($items['youtub_link']);

	$related = get_related_top_ideas($id);
	$uid=$items['university_id'];
	$university=get_university();

    $app->render("header.tpl.php" , array('item' => $items, 'youtubeID' => $youtubeID));
	$app->get('universitydetails.tpl.php', 'convertYoutube');
    $app->render("universitydetails.tpl.php" ,array('item' => $items,'related'=>$related, 
	'university' => $university[$uid]));
    $app->render("footer.tpl.php");
});*/

$app->post('/responder', function() use ($app) {
  if($app->request->isPost()) {
    post_data_save();
  }
});

$app->post('/setlike', function() use ($app) {
  if($app->request->isPost()) {
    $id = $app->request->post('id');
    print post_like_save($id);
  }
});

$app->get('/login', function() use ($app) {
  $app->render("header.tpl.php");
  $app->render("login.tpl.php");
  $app->render("footer.tpl.php");
});

$app->post('/login', function () use ($app) {
  if($app->request->isPost()) {
    $user = $app->request->post('user');
    $pass = $app->request->post('pass');
    if($user == 'mcadmin' && $pass = 'mcpass') {
      $_SESSION['user'] = 1;
      $app->response->redirect('submit');
    }
  }
});

$app->get('/logout', function () use ($app) {
      unset($_SESSION['user']);
      $app->response->redirect('/dunmun');
});

$app->get('/backoffice', function() use ($app) {
  if(!empty($_SESSION['user'])) {
	$app->render("header.tpl.php");
	//print "<br><br><br><br><br>";
	show_post_data();
	//$app->render("footer.tpl.php");
  } else {
    $app->response->redirect('login');
  }
});



/*$app->get('/submit', function() use ($app) {
  $app->render("header.tpl.php");
  $app->render("submit.tpl.php");
  $app->render("footer.tpl.php");
});*/

$app->post('/submit', function () use ($app) {
  if($app->request->isPost()) {
    $msg = post_validate($app);
    if($msg) {
      $app->flashNow('error', $msg);
      $app->render("header.tpl.php");
      $app->render("submit.tpl.php", array('data' => $app->request->post()));
      $app->render("footer.tpl.php");
    } else {
    	post_doc_file_upload();
    	post_data_save();
      $app->flash('info', '<p class="colorgreen text-center">Success! Thanks for your submission.</p>');
      $app->response->redirect('submit');
    }
  }
});



$app->get('/submit', function() use ($app) {
  if(!empty($_SESSION['user'])) {
		$app->render("header.tpl.php");
		$app->render("submit.tpl.php");
		$app->render("footer.tpl.php");
	//print "<br><br><br><br><br>";
	//show_post_data();
	//$app->render("footer.tpl.php");
  } else {
    $app->response->redirect('login');
  }
});



$app->run();
