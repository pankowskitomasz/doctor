<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["errorMessage"])){
    $_SESSION["errorMessage"] = "Unfortunately your message was not send due to technical ";
    $_SESSION["errorMessage"] .= "problems. Please try again later or contact with us by phone.";
}

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="node_modules/material-components-web/dist/material-components-web.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <title>e-Doctor | Error</title>
    </head>
    <body>  
        <header class="mdc-top-app-bar border-none bg-white border-b border-dark shadow">
            <nav class="mdc-top-app-bar__row">
                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                    <img class="navbar-logo float-left" src="img/navbar_logo.png" alt="logo">
                    <span class="font-bold text-blue font-logo">
                        e-Doctor
                    </span>
                </div>
                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end d-block desktop-expand">
                    <button class="mdc-top-app-bar__action-item mdc-icon-button nav-menu-icon">
                        <span class="mdc-icon-button__ripple"></span>
                        <span class="fa fa-bars text-blue"></span>                    
                    </button>
                    <div class="nav-menu text-right">
                        <a href="index.html" class="mdc-top-app-bar__action-item mdc-button nav-item">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label text-blue">Home</span>                    
                        </a>
                        <a href="doctors.html" class="mdc-top-app-bar__action-item mdc-button nav-item">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label text-blue">Doctors</span>                    
                        </a>
                        <a href="how-it-works.html" class="mdc-top-app-bar__action-item mdc-button nav-item">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label text-blue">How it works</span>                    
                        </a>
                        <a href="book-a-session.html" class="mdc-top-app-bar__action-item mdc-button nav-item">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label text-blue">Book a Session</span>                    
                        </a>
                        <a href="user.php" class="mdc-top-app-bar__action-item mdc-button nav-item">
                            <div class="mdc-button__ripple"></div>
                            <span class="mdc-button__label text-blue">Login</span>                    
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <section class="user-s1 mdc-layout-grid flex bg-blue shadow minh-25vh pt-adjust">
            <div class="mdc-layout-grid__inner w-100">
                <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--align-middle text-center">
                    <div class="text-white text-shadow">
                        <h2>
                            Message sent
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="user-s2 mdc-layout-grid minh-75vh flex align-center">
            <div class="mdc-layout-grid__inner w-100">
                <div class="mdc-layout-grid__cell--span-1-tablet mdc-layout-grid__cell--span-3-desktop"></div>
                <div class="mdc-layout-grid__cell--span-12-phone mdc-layout-grid__cell--span-6-tablet mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-card w-100 border border-blue p-2">
                        <h3 class="text-center text-blue">Error!</h3>
                        <p class="text-center">
                                <?php
                                    echo $_SESSION["errorMessage"];
                                ?>
                            </p>  
                        <div class="text-center">
                            <a href="book-a-session.html" 
                                class="mdc-button mdc-button--outlined text-blue border-blue">
                                <span class="mdc-button__ripple"></span>
                                OK
                            </a>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="mdc-layout-grid bg-dark text-white border-t border-gray pb-0">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell--span-12 text-center text-white">
                    <img class="navbar-logo filter-grayscale" src="img/navbar_logo.png" alt="logo">
                    <div class="font-bold text-white font-logo">
                        <small>e-Doctor</small>
                    </div>
                    <address>
                        <small>
                            +(00) 123-456-7890<br/>
                            contact&#64;edoctor.mail
                        </small>
                    </address>
                </div>
                <div class="mdc-layout-grid__cell--span-12 text-center border-t border-dark-gray">
                    <small class="mdc-layout-grid__cell--span-12 text-center text-white">  
                        Copyright &copy; 2020-2021 Tomasz Pankowski. All rights reserved.
                        <a class="text-white link" href="privacy.html">Privacy policy</a>
                    </small>            
                </div>
            </div>
        </footer>
    <script src="node_modules/material-components-web/dist/material-components-web.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
<?php $_SESSION["errorMessage"]=null ?>