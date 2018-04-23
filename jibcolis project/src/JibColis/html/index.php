&<?php
session_start();
function seConnecterGOOGLE()
{
    include "gpCallback.php";
}

if (isset($_GET['connecte'])) {
    if (isset($_SESSION['fb_access_token'])) {
        unset($_SESSION['fb_access_token']);
    }
    seConnecterGOOGLE();
}

if (isset($_GET['decc'])) {
    unset($_SESSION['token']);
    unset($_SESSION['fb_access_token']);
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<!--INCLURE DE LA-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
          content="296518496590-2qnum6hr0ccclr46ecn1fu4iglf1gvtf.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="googleLogin.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="../scripts/fbConnect.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
            integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
            crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Allerta' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/standard_style.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>JibColis</title>
</head>
<body>
<div id="menu">
    <nav class="navbar navbar-default hid">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img height="100%" src="../logo.png" alt="Logo_JIBCOLIS">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-right collapse navbar-collapse" id="myNavbar">
                <button class="btn btnjcm menubtn" href="#" id="how">Comment ça marche</button>
                <button class="btn navbar-btn f"><i class="fa fa-facebook" aria-hidden="true"></i>
                    <?php include "fbLogin.php";
                    if (isset($_SESSION['token'])) {
                        unset($_SESSION['token']);
                    }
                    echo '<a href="' . $facebookConnect . '">Login</a>';
                    ?>
                </button>
                <button class="btn navbar-btn g"><i class="fa fa-google" aria-hidden="true"></i>

                    <a href="index.php?connecte=true">Login2</a></button>

                <button class="btn btnjcv menubtn" data-toggle="modal" data-target="#cnx_modal">Se connecter</button>
                <a href="signup.html" class="btn btnjcm menubtn" onclick="redirect()">S'incrire</a>
				
				
<!-- Contenu de la page se connecter-->
                <div id="cnx_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="jumbotron jumjc">
                                    <h3><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</h3>
                                    <p>
                                        <a href="signup.html">Créer un compte</a> - <a href="#">Mot de passe oublié
                                            ?</a>
                                    </p>
                                </div>
                                <div class="container">
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <form class="form-horizontal">

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-user"></i></span>
                                                        <input id="email" type="mail" class="form-control" name="email"
                                                               placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-lock"></i></span>
                                                        <input id="password" type="password" class="form-control"
                                                               name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btnjcv menubtn"
                                                            style="width:100%;margin-top:5px;" id="btn_cnx">Connexion
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                        <h6>S'identifier avec</h6>
                                        <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div style="color:white;padding-top:20px;">
                                    notext
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
<!--JUSQUE LA-->
            </div>
        </div>
    </nav>
</div>


<div class="section1">
    <div class="main">
        <div>
            <h3>JibColis <img width="30px" height="30px" src="../logo2.png" alt=""> AwidColis</h3>
            <br>
            <p class="fort">TRANSPORT DE COLIS ENTRE PARTICULIERS <br>DE MAIN A MAIN !</p>
        </div>

        <div class="row pad">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button class="btn btnjbl vertf" name="button" data-toggle="modal" data-target="#cnx_modal">Déposer une annonce</button>
            </div>
            <div class="col-md-3">
                <button class="btn btnjbr maronf" name="button" data-toggle="modal" data-target="#cnx_modal">Voir les annonces</button>
            </div>
            <div class="col-md-3"></div>
        </div>

        <a id="more">En savoir plus ... </a>
    </div>

</div>
<div class="section2">
    <div class="c row prs">
        <div class="col-md-1"></div>
        <div class="media col-md-10">
            <div class="media-left">
                <img src="../logo2.png" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <h4 class="media-heading"><span class="titre">JibColis - AwidColis</span></h4>
                <p>C'est la 1ère plateforme GRATUITE destinée à la diaspora maghrébine, de mise en relation entre
                    l'EXPEDITEUR
                    souhaitant envoyer un colis et LE VOYAGEUR acceptant de transporter ce même colis.
                    Le voyageur et l'expéditeur sont libres de négocier
                    entre eux une contre partie en échange du service fourni</p>
            </div>
        </div>

    </div>
</div>
<div class="row desc">
    <div class="container">
        <div class="col-md-4">
            <div class="illus">
                <img width="100%" src="../confiance.png" alt="">
            </div>
            <p class="desc_text">Sécurité/Confiance <br><br>Après accord entre le voyageur et le transporteur une
                attestation constituant une preuve de remise de votre colis est imprimable ICI</p>
        </div>
        <div class="col-md-4">
            <div class="illus">
                <img width="100%" src="../économie.png" alt="">
            </div>
            <p class="desc_text">Economique/ Solidaire <br><br> Un système Voyageur-Expéditeur gagnant- gagnant. Le
                voyageur peut amortir son billet.
                De son côté, l’expéditeur évite de se déplacer dans les aéroports ou
                dans les gares et peut envoyer son colis à moindre coût, voir gratuitement.</p>
        </div>
        <div class="col-md-4">
            <div class="illus">
                <img width="100%" src="../eco.png" alt="">
            </div>
            <div class="desc_text">Ecologique <br><br>
                <p>
                    Réduire l'émission en CO2 des transports,
                    en optimisant les trajets des voyageurs existants plutôt que d'en créer de nouveaux.
                </p>
            </div>
        </div>
    </div>
</div>

<footer class="maronc">
    <div class="container-fluid">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <ul>
                <li><a href="#">PRÉSENTATION</a></li>
                <li><a href="#">QUI SOMMES NOUS</a></li>
                <li><a href="#">NOS OBJECTIFS</a></li>
                <li><a href="#">CGU</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <ul>
                <li><a href="#">PARTENAIRES</a></li>
                <li><a href="#">ADDRA</a></li>
                <li><a href="#">PRESSE</a></li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="rs">
                <a href="#" class="fa fa2 fa-facebook"></a>
                <a href="#" class="fa fa2 fa-twitter"></a>
                <a href="#" class="fa fa2 fa-linkedin"></a>
                <a href="#" class="fa fa2 fa-instagram"></a>
                <a href="#" class="fa fa2 fa-youtube"></a>
            </div>
            <br>
            <div class="mail">
                <input type="text" class="newsletter" name="mail" placeholder="NEWSLETTER" value="">
                <div class="inscription">S'INSCRIRE</div>
            </div>
        </div>
    </div>

</footer>
<div class="rights">
    Copyright (c) 2017 JibColis All Rights Reserved.
</div>
</div>
</body>


<script type="text/javascript">
    $(function () {
        setTimeout(function () {
            $('#more').fadeIn('slow');
        }, 1000);

        $('#more').click(function () {
            window.location.replace("comment_ca_marche.html");
        });

        $('#how').click(function () {
            window.location.replace("comment_ca_marche.html");
        });

        $('#btn_cnx').click(function () {
            window.location.replace("profil.html");
        });

    });
</script>
</html>
