logInWithFacebook = function () {
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                window.location.replace("http://localhost/jibcolis%20project/src/JibColis/html/profil.php?");
            });
        } else {
            alert("non authorisé");
            console.log('User cancelled login or did not fully authorize.');
        }
    });
};
window.fbAsyncInit = function () {
    FB.init({
        appId: '149232425750031',
        cookie: true, // This is important, it's not enabled by default
        version: 'v2.2'
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));