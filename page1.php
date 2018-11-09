<?php
/**
 * Created by PhpStorm.
 * User: Simmi
 * Date: 22-10-2018
 * Time: 22:23
 */

?>
<html>
<head>
    <title>Log into facebook</title>
</head>
<body>
<script>

    function setCookie(cname,cvalue){
        console.log("cookie set");
        console.log(cvalue);
        document.cookie=cname+"="+cvalue+";path=/";
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '694068114298681',
            cookie     : true,
            xfbml      : true,
            version    : 'v3.2'
        });

        FB.AppEvents.logPageView();

    };

    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
            //testAPI();
        } else {
            document.getElementById('status').innerHTML = 'Please log ' +'into this app.';
        }
    }


    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));




    function checkLoginState(){
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);

        });
    }

    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }





</script>

    <form>
        Username   :<input type="text" name="un"><br>
        Password   :<input type="text" name="pw"><br>
        <input type="button" name="sub" value="log in">
    </form>

    <fb:login-button
            scope="public_profile,email"
            onlogin="checkLoginState();">
    </fb:login-button>


</body>

</html>
