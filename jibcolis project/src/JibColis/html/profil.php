// <?php
//session_start();

//if (!isset($_SESSION['token']) && !isset($_SESSION['fb_access_token'])) {
//    header("location:index.php");
//    exit;

// ?>
<!DOCTYPE html>
<!--INCLURE DE LA-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="../css/style_profil.css">
    <title>JibColis</title>
</head>
<body>
<div id="menu">
    <nav class="navbar navbar-default hid">
        <div class="container">

            <div class="navbar-header">
                <div class="navbar-brand ">
                    <img src="../images/jug.jpg" class="profil_photo" alt="Logo_JIBCOLIS">
                    <span class="dropdown">
              <h4 class="profil_brand" type="button" data-toggle="dropdown">JUGURTHA <span class="caret"></span></h4>
              <ul class="dropdown-menu">
                <li><a href="#">Mon profil</a></li>
                <li><a href="#">Mes colis</a></li>
                <li><a href="#">Mes trajets</a></li>
                <li><a href="#">Ma messagerie</a></li>
                <li><a href="#">Deconnexion</a></li>
              </ul>
            </span>
                </div>


                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-right collapse navbar-collapse" id="myNavbar">
          <span class="dropdown">
          <button class="btn btnjcm menubtn dropdown-toggle" type="button" data-toggle="dropdown">Voyageur
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="list_voyageur.html">Liste des voyageurs</a></li>
            <li><a href="transporteur.html">Transporter</a></li>
          </ul>
          </span>
                <span class="dropdown">
          <button class="btn btnjcv menubtn dropdown-toggle" type="button" data-toggle="dropdown">Expéditeur
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="list.html">Liste des colis</a></li>
            <li><a href="expediteur.html">Expédier</a></li>
          </ul>
          </span>
                <a href="comment_ca_marche.html" class="btn btnjcm menubtn">Aide</a>
                <button class="btn navbar-btn f"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                <button class="btn navbar-btn g"><i class="fa fa-google" aria-hidden="true"></i></button>
            </div>

        </div>
    </nav>
    <div class="corp container">
        <h3>Tableau de bord</h3>

        <div class="row tab_bord">
            <div class="a ab col-md-6 x3">
                <h4>Messagerie</h4>
                <span class="badge">5</span> message(s) non lu(s)<br><br>
                <img id="msg_ic" class="ab" width="100px" height="100px" src="../msg.png" alt="">
            </div>

            <div class="col-md-6 x3">
                <div class="row x2">
                    <div class="col-md-4 x2">
                        <div class="b row x1">
                            <h4>Mes colis</h4>
                            <img id="col_ic" width="50px" height="50px" src="../colis.png" alt="">
                        </div>
                        <div class="c row x1">
                            <h4>Mes trajets</h4>
                            <img id="trajet_ic" width="50px" height="50px" src="../trajet.png" alt="">
                        </div>
                    </div>
                    <div class="d col-md-8 x2">
                        <h4>Editer mon profil</h4><br>
                        <img id="edit_ic" width="80px" height="80px" src="../edit.png" alt="">
                    </div>
                </div>
                <div class="e row x1">
                    <h4 class="dec">Se deconecter</h4>
                    <a href="index.php?decc=true">
                        <img id="dec_ic" style="position:" width="80px" height="80px" src="../dec.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--JUSQUE LA-->

<script type="text/javascript">
    $(function () {
        $(".ab").mouseover(function () {
            $("#msg_ic").show(100);
        });

        $(".ab").mouseout(function () {
            $("#msg_ic").hide(100);
        });

        $(".b").mouseover(function () {
            $("#col_ic").show(100);
        });

        $(".b").mouseout(function () {
            $("#col_ic").hide(100);
        });

        $(".c").mouseover(function () {
            $("#trajet_ic").show(100);
        });

        $(".c").mouseout(function () {
            $("#trajet_ic").hide(100);
        });

        $(".d").mouseover(function () {
            $("#edit_ic").show(100);
        });

        $(".d").mouseout(function () {
            $("#edit_ic").hide(100);
        });

        $(".e").mouseover(function () {
            $(".dec").hide();
            $("#dec_ic").show(100);
        });

        $(".e").mouseout(function () {
            $(".dec").show();
            $("#dec_ic").hide(100);
        });

    });
</script>
