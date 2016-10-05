<?php
	session_start();
	ini_set('display_errors', 1);
	error_reporting(E_ALL);	
	require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
/*
	$facebook = new Facebook(array(
		'appId'  => "1772642716308252",
		'secret' => "72eb458f5dcd24601bb505bca0211154",
		"cookie" => true,
		'fileUpload' => true
	));
*/
 $fb = new Facebook\Facebook([
  'app_id' => '1772642716308252',
  'app_secret' => '72eb458f5dcd24601bb505bca0211154',
  'default_graph_version' => 'v2.6',
  'cookie' => true,
  'fileUpload' => true
]);



$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  echo $accessToken;
}
echo $accessToken."hello";

exit;
	
	$user_id = $facebook->getUser();
	
	if($user_id == 0 || $user_id == "")
	{
		$login_url = $facebook->getLoginUrl(array(
		'redirect_uri'         => "http://apps.facebook.com/rapid-apps/",
		'scope'      => "email,publish_stream,user_hometown,user_location,user_photos,friends_photos,
					user_photo_video_tags,friends_photo_video_tags,user_videos,video_upload,friends_videos"));
		
		echo "<script type='text/javascript'>top.location.href = '$login_url';</script>";
		exit();
	}
	
	//get profile album
	$albums = $facebook->api("/me/albums");
	$album_id = ""; 
	foreach($albums["data"] as $item){
		if($item["type"] == "profile"){
			$album_id = $item["id"];
			break;
		}
	}
	
	//set photo atributes
	$full_image_path = realpath("Koala.jpg");
	$args = array('message' => 'Uploaded by 4rapiddev.com');
	$args['image'] = '@' . $full_image_path;
	
	//upload photo to Facebook
	$data = $facebook->api("/{$album_id}/photos", 'post', $args);
	$pictue = $facebook->api('/'.$data['id']);
	
	$fb_image_link = $pictue['link']."&makeprofile=1";
	
	//redirect to uploaded photo url and change profile picture
	echo "<script type='text/javascript'>top.location.href = '$fb_image_link';</script>";
?>
