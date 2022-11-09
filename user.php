<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();   
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_message.php";
include_once "php/t_user.php";

//to remove after pub
//include_once "php/support.php";
//createAdminAccount("password","admin@mussodent.com","9731");

if(isset($_POST["username"])
&& isset($_POST["userpass"])){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->getByName(htmlspecialchars($_POST["username"]));
    if($usr->getData("username")===htmlspecialchars($_POST['username'])
    && $usr->getData("password")===sha1(htmlspecialchars($_POST['userpass']))
    ){
        $_SESSION["UserLogged"] = $usr->getData("username");
    }
}

if(isset($_SESSION["UserLogged"])){
    //reading view config
    if(isset($_POST["login"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["dashboard"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["messages"])){
        $_SESSION["view"] = "messages";
    }
    if(isset($_POST["users"])){
        $_SESSION["view"] = "users";
    }
    if(isset($_POST["edituser"])){
        $_SESSION["view"] = "edituser";
    }
    if(isset($_POST["msginfo"])){
        $_SESSION["view"] = "msginfo";
    }
    if(isset($_POST["msgsearch"])){
        $_SESSION["view"] = "msgsearch";
    }
    if(isset($_POST["logout"])){
        $_SESSION["view"] = "logout";
    }
    
    //template selection and config
    if(isset($_SESSION["view"])){
        switch($_SESSION["view"]){
            case "messages":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "users":
                $_SESSION["viewTemplate"] = "templates/tmp_users.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "dashboard":
                $_SESSION["viewTemplate"] = "templates/tmp_dashboard.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msginfo":
                $_SESSION["viewTemplate"] = "templates/tmp_message_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msgsearch":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "edituser":
                $_SESSION["viewTemplate"] = "templates/tmp_edituser.php";
                break;
            default: 
                $_SESSION["viewTemplate"] = "templates/tmp_login.php";     
                $_SESSION = array();
                session_destroy(); 
        }
    }
}
else{
    $_SESSION["viewTemplate"] = "templates/tmp_login.php";
}

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
        <meta property="og:title" content="Doctor">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <meta property="og:locale" content="en_US">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/styles.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <title>e-Doctor | User</title>
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
        <?php
            if(isset($_SESSION["viewTemplate"])){
                include $_SESSION["viewTemplate"]; 
            }
            else{
                include "templates/tmp_login.php";                            
            }
        ?>
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
                        Copyright &copy; 2020-2022 Tomasz Pankowski. All rights reserved.
                        <a class="text-white link" href="privacy.html">Privacy policy</a>
                    </small>            
                </div>
            </div>
        </footer>
        <script src="js/main.min.js"></script>
    </body>
</html>