<?php

class MyDB extends SQLite3 {
  function __construct() {
    $this->open('./db/fsd.db');
  }
}

function post_validate(&$app) {
  $error = array();
  $error_main = '';
  $post = $app->request->post();
  
  if(empty($post['district_name'])) {
    $error[] = 'Name is required.';
  }

  if(empty($post['description'])) {
    $error[] = 'Description is required.';
  }
  
  // if(empty($post['password'])) {
  //   $error[] = 'Password is required.';
  // }
  

  //  if($_FILES['doc']['size'] == 0) {
  //   $error[] = 'File Upload is required.';
  // }
  // if($_FILES['doc']['size'] > 10485760) {
  //   $error[] = 'Maximum photo upload size 10 MB.';
  // }
  

  if($error_main) {
    $error = array($error_main);
  }

  return implode('<br/>', $error);
}

/*function post_file_upload() {
  $storage = new \Upload\Storage\FileSystem('images');
  $file = new \Upload\File('photo', $storage);

  $new_filename = uniqid();
  $file->setName($new_filename);

  $file->addValidations(array(
    new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
    new \Upload\Validation\Size('5M')
  ));

  $data = array(
    'name' => $file->getNameWithExtension(),
    'size' => $file->getSize(),
  );

  try {
    $file->upload();
  } catch (\Exception $e) {
    $errors = $file->getErrors();
  }

  if(!empty($errors)) {
    print implode('<br/>', $errors);
  } else {
    $data['data'] = base64_encode(file_get_contents('images/' . $data['name']));
    unlink('images/' . $data['name']);
    $_POST['image'] = $data;
  }
}*/

function post_doc_file_upload() {
  $storage = new \Upload\Storage\FileSystem('doc');
  $file = new \Upload\File('doc', $storage);

  $new_filename = uniqid();
  $file->setName($new_filename);

  $file->addValidations(array(
		new \Upload\Validation\Mimetype(array(
		// 'application/msword',
		// 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		// 'application/vnd.ms-excel',
		// 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		// 'application/vnd.ms-powerpoint',	
		// 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		// 'application/pdf',
		'image/png', 
		'image/jpg', 
		'image/jpeg', 
		'image/gif')),
    new \Upload\Validation\Size('10M')
  ));

  $data = array(
    'name' => $file->getNameWithExtension(),
    'size' => $file->getSize(),
  );

  try {
    $file->upload();
  } catch (\Exception $e) {
    $errors = $file->getErrors();
  }

  if(!empty($errors)) {
    print implode('<br/>', $errors);
  } else {
    $data['data'] = base64_encode(file_get_contents('doc/' . $data['name']));
    unlink('doc/' . $data['name']);
    $_POST['newdoc'] = $data;
  }
}


function post_data_save() {
  // $ips = array('103.16.74.138', '10.100.200.138');
  // if(!empty($_SERVER['SERVER_ADDR']) && !in_array($_SERVER['SERVER_ADDR'], $ips)) {
  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_URL, "http://10.100.200.138/dunmun/index.php/responder");
  //   curl_setopt($ch, CURLOPT_POST, 1);
  //   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //   $server_output = curl_exec ($ch);
  //   curl_close ($ch);
  // } else {

  
    $db = new MyDB();

  	// if(!empty($_POST['newdoc'])) {
  	// 	$data = base64_decode($_POST['newdoc']['data']);
  	// 	file_put_contents('./doc/' . $_POST['newdoc']['name'], $data);
  	// }
  $district_name = !empty($_POST['district_name']) ? $_POST['district_name'] : '';
    $description = !empty($_POST['description']) ? $_POST['description'] : '';
    // date_default_timezone_set('Asia/Dhaka');
    $sql = "insert into story values(NULL, '" 
  . htmlspecialchars($district_name, ENT_QUOTES) . "', '" 
  . htmlspecialchars($description, ENT_QUOTES) . "')";
    $db->query($sql);
    return true;
  }
  
// }


function post_like_save($id) {
  if(!empty($_COOKIE['fsd'])) {
    $ids = explode(',', $_COOKIE['fsd']);
    if(in_array($id, $ids)) {
      return '-1';
    } else {
      $ids[] = $id;
      setcookie('fsd', implode(',', $ids), time() + 5184000);
    }
  } else {
    setcookie('fsd', $id, time() + 5184000);
  }

/*  if($_SERVER['SERVER_ADDR'] != '103.16.74.138') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://dev.thedailystar.net/friendshipday/setlike");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
  } else {*/
    $db = new MyDB();
    $sql = "select vote from idea where id = " . $id;
    $data = $db->query($sql);
    $row = $data->fetchArray(SQLITE3_ASSOC);
    if(isset($row['vote'])) {
      $row['vote']++;
      $sql = "update idea set vote = " . $row['vote'] . " where id = " . $id;
      $db->query($sql);
      return $row['vote'];
    } else {
      return 0;
    }
 /* }*/
}

function show_post_data() {
  $db = new MyDB();

  $sql = "select * from submissions";
  $data = $db->query($sql);
  
  print '<a target="_blank" href="/dunmun/logout" >Log-out</a>';
  
  print '<table width="100%" border="1" style="margin-top:100px;">';
  print '<tr><th>id</th>
		<th>Reg ID</th>
		<th>university_name</th>
		<th>team_name</th>
		<th>project_name</th>
		<th>your_product</th>
		<th>team_leader</th>
		<th>member1 name</th>
		<th>member1 cell</th>
		<th>member1 email</th>
		<th>member2 name</th>
		<th>member2 cell</th>
		<th>member2 email</th>
		<th>member3 name</th>
		<th>member3 cell</th>
		<th>member3 email</th>
		<th>your_industrial_area</th>
		<th>your_idea</th>
		<th>doc</th>
		<th>status</th>
		<th>like</th></tr>';
  
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    print '<tr>';
    foreach($row as $k => $r) {
      if($k == 'image') {
        print '<td><a target="_blank" href="/dunmun/images/' . $r . '">View Image</a></td>';
      } else if($k == 'doc'){
	     print '<td><a target="_blank" href="/dunmun/doc/' . $r . '">Download Doc</a></td>';
	  }else if($k == 'your_idea'){
      print '<td>' . substr($k , 0, 50) . '</td>';
    }else {
        print '<td>' . $r . '</td>';
      }
    }
    print '</tr>';
  }
  print '</table>';
}





function get_news() {
  $db = new MyDB();

  $sql = "select * from news order by time desc ";
  $data = $db->query($sql);

  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}




function get_time() {
  $db = new MyDB();

  $sql = "select DISTINCT time from news order by id desc ";
  $data = $db->query($sql);

  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}



function get_data($limit = 12, $offset = 0) {
  $db = new MyDB();

  $sql = "select * from submissions order by id desc limit $offset,$limit";
  $data = $db->query($sql);

  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}



function get_news_for_index($limit = 10, $offset = 0) {
  $db = new MyDB();

  $sql = "select * from news order by id desc limit $offset,$limit";
  $data = $db->query($sql);

  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}

function get_ideas_single_university_list($id){
  $db = new MyDB();

  $sql = "select * from idea where university_id=$id ";
  $data = $db->query($sql);

  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}



function get_ideas_single_university($id) {
  $db = new MyDB();

  $sql = "select * from idea where id = $id";
  $data = $db->query($sql);
  return $row = $data->fetchArray(SQLITE3_ASSOC);
}



function get_university(){

	$university = array(
		"1"=>"University of Dhaka", 
		"2"=>"Iba, University Of Dhaka",
		"3"=>"University Of Rajshahi",
		"4"=>"Patuakhali Science And Technology University",
		"5"=>"Bangladesh University Of Engineering And Technology", 
		"6"=>"North South University"

	 );

	return $university;
}

function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
"<iframe width='100%' height='270px' class='video'  src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}



function reverce($data){

$datedata=preg_split("/\-{1,}/",$data);

$e1=$datedata[0];
$e2=$datedata[1];
$e3=$datedata[2];
$newdate=$e3."-".$e2."-".$e1;
return $newdate;
}


function youtube_id_from_url($url) {
            $pattern = 
                '%^# Match any youtube URL
                (?:https?://)?  # Optional scheme. Either http or https
                (?:www\.)?      # Optional www subdomain
                (?:             # Group host alternatives
                  youtu\.be/    # Either youtu.be,
                | youtube\.com  # or youtube.com
                  (?:           # Group path alternatives
                    /embed/     # Either /embed/
                  | /v/         # or /v/
                  | /watch\?v=  # or /watch\?v=
                  )             # End path alternatives.
                )               # End host alternatives.
                ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
                $%x'
                ;
            $result = preg_match($pattern, $url, $matches);
            if ($result) {
                return $matches[1];
            }
            return false;
        }


function get_data_single($id) {
  $db = new MyDB();

  $sql = "select * from news where id = $id";
  $data = $db->query($sql);
  return $row = $data->fetchArray(SQLITE3_ASSOC);
}

function get_related_item($id, $limit = 2) {
  $db = new MyDB();

  $sql = "select * from news where id <> $id ORDER BY id desc limit 0,$limit";
  $data = $db->query($sql);
  $result = array();
  while($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}


function get_related_top_ideas($id, $limit = 2) {
  $db = new MyDB();

  $sql = "select * from idea where id <> $id ORDER BY vote desc limit 0,$limit";
  $data = $db->query($sql);
  $result = array();
  while($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}



function post_exist($email) {
  $db = new MyDB();

  $sql = "select id from submissions where email = '$email'";
  $data = $db->query($sql);
  $row = $data->fetchArray(SQLITE3_ASSOC);
  return !empty($row['id']) ? 1 : 0;
}




