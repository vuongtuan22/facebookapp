 <?php
 require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
 $fb = new Facebook\Facebook([
  'app_id' => '1772642716308252',
  'app_secret' => '72eb458f5dcd24601bb505bca0211154',
  'default_graph_version' => 'v2.5',
  'cookie' => true,
  'fileUpload' => true
]);

        if(isset($_POST['photo']))
        {
            $data = $_POST['photo'];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/Facebookapp/photos/".time().'.png', $data);
            echo $_SERVER['DOCUMENT_ROOT'];
            exit;
        }
 ?>

 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Antztek</title>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="bootstrap/css/customize.css" rel="stylesheet">
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/customize.js"></script>

	<script type="text/javascript">
        //----------------------- Document tab ------------------------------
        $(document).ready(function() {
            myCanvas(null);
        });
        function myCanvas(element) {
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("scream");
            ctx.drawImage(img,0,0);
            console.log("hello");


            if(element!=null){
                ctx.drawImage(element,10,408 );
                var dataUrl = c.toDataURL('image/jpeg');
                console.log(img.src);

                $.ajax({
                      method: 'POST',
                      url: 'index.php',
                      data: {
                        photo: dataUrl
                      }
                    });
            }
        }
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '1772642716308252',
              xfbml      : true,
              version    : 'v2.7'
            });

            // ADD ADDITIONAL FACEBOOK CODE HERE
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
     </script>
</head>
<body style="margin-top: 0px;">
	<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      	<div id="About" class="row content">
            <div class="col-md-6 col-lg-6 left_colum">
                <img id="scream" src="images/bigData.jpg" alt="The Scream">
                <canvas id="myCanvas" width="489" height="489"></canvas>
            </div>
            <div class="col-md-6 col-lg-6 righ_colum">  
                <ul>
                    <li><img src="images/tuanvd.png" alt="startup co-founder" title="Tuan" onclick="myCanvas(this)"></li>
                    <li><img src="images/minhld.png" alt="startup co-founder" title="Minh" onclick="myCanvas(this)"></li>
                    <li><img src="images/anhnt.png" alt="startup co-founder" title="The Anh" onclick="myCanvas(this)"></li>
                </ul>
                <p><button id="hello" onclick="getID(this)">Make it is Facebook advantar</button></p>
            </div> 

<<<<<<< HEAD
        </div>
        <div id="Solution" class="row content">   
=======
<body>
<h2>Just photo</h2>
>>>>>>> 362098d74d059e37f0b60c6337b961eceba020ea

        </div>
        
    </div>
</body>
</html> 