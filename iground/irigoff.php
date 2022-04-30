<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<?php

// Initialize the session
session_start();

// verificam daca user-ul este logat, iar, daca nu, il redirectionam la pagina  de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
#include('iground/index.html');
?>
<?php
    function takes_array($input)
    {
        echo "$input[0] + $input[1] = ", $input[0]+$input[1];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Irigatie</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/templatemo-diagoona.css" rel="stylesheet" />

</head>

<body>
    <div class="tm-container">
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
                        <i class="fas fa-lightbulb fa-5x mt-1 tm-logo"></i>
                        <div class="media-body">
                            <h1 style="color:white;" class="tm-sitename " >iGround</h1>
                            <p class="tm-slogon">We are all Earth</p>
                        </div>
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button"
                            data-toggle="collapse" data-target="#navbar-nav"
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="#">Irigiatie <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="wol.php">Wake-on-lan</a>
				                </li>

				                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="contact.php">Contact</a>
                                </li>
				                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="../logout.php">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                        <meta http-equiv="refresh" content="2;URL=../iground/irig.php">
                        <?php
                        $view = $_GET['view'];
                        #echo 'view='.$view;
                        if($view == '0'){
                           $output = shell_exec('snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 int 1');
                           echo '<h2 class="mb-5 tm-content-title">Irigatia este oprita</h2>';
                        }
                        $view = $_GET['view'];
                        if($view == '2'){
                           $output = shell_exec('snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.3.0 int 1');
                            echo '<h2 class="mb-5 tm-content-title">Pompa este oprita</h2>';

                        }
                        #echo $output;
                        return;
                        ?>
                    </section>
                </main>
            </div>
        </div>


        <div class="tm-row">
            <div class="tm-col-left text-center">
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>
            </div>
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0">Copyright 2022 iGround.me
                    | Design: <a rel="nofollow" target="_parent" href="http://www.iground.me" class="tm-text-link">iGround</a></p>
                </footer>
            </div>
        </div>

        <!-- Diagonal background design -->
        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>
