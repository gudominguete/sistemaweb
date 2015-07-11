// JavaScript Document

window.fbAsyncInit = function() {
    FB.init({
        appId      : '928328460534156',
       xfbml      : true,
       version    : 'v2.2'
    });
  };

function statusChangeCallback(response) {
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    console.log("teste");
    location.href="validarlogincliente.php?id="+response.authResponse.userID;
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    document.getElementById('status').innerHTML = 'Please log ' +
      'into this app.';
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    document.getElementById('status').innerHTML = 'Please log ' +
      'into Facebook.';
  }
}


function statusChangeCallback2(response) {
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
  } else  {
  	location.href="../index.php";
  }
}


function checkLoginState(index) {
	if(index===0){
		FB.getLoginStatus(function(response) {
           statusChangeCallback(response);
        });
	}
	else
	{
		FB.getLoginStatus(function(response) {
           statusChangeCallback2(response);
        });
	}
}

function testAPI(){
	FB.api('/me', function(response) {
	    console.log(response);
	});
}

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

function clienteLougout()
{
	FB.logout(function(response) {
		console.log("logout");
    });
}