<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>vuongvu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1772642716308252',
          xfbml      : true,
          version    : 'v2.7'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
        function onLogin(response) {
          if (response.status == 'connected') {
            FB.api('/me?fields=first_name', function(data) {
              var welcomeBlock = document.getElementById('fb-welcome');
              welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
            });
          }
        }

        FB.getLoginStatus(function(response) {
          // Check login status on load, and if the user is
          // already logged in, go directly to the welcome message.
          if (response.status == 'connected') {
            onLogin(response);
          } else {
            // Otherwise, show Login dialog first.
            FB.login(function(response) {
              onLogin(response);
            }, {scope: 'user_friends, email'});
          }
        });
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

<body>
<h2>Debugging facebook app </h2>

<h1 id="fb-welcome"></h1>
</body>
</html>
