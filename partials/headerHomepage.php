<?php require_once("Repository/homepageRepository.php");
    session_start();
    $repository=new homepageRepository();
    $first8categories=$repository->first7categories();
    $otherCategories=$repository->otherCategories();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="../assets/vendors/aos/dist/aos.css/aos.css" />
    <link rel="stylesheet" href="./assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="./assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css"/>
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<div class="container-scroller">
    <div class="main-panel">
        <header id="header">
            <div class="container">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="d-flex justify-content-between align-items-center navbar-top">
                        <ul class="navbar-left">
                           <!-- <li>
                                <h6><?=$countryName,$cityName?></h6>
                                <b><?=$temp[0]->WeatherText?></b><br>
                                <b><?=$temp[0]->WeatherIcon?></b><br>
                                <img src='<?=$image?>'>
                                <h6><?=$temp[0]->Temperature->Metric->Value?> <?=$temp[0]->Temperature->Metric->Unit?></h6>
                                <a href='<?=$temp[0]->Link?>' target='_blank'>More informations about weather...</a>
                            </li>-->
                            <li><?php
                                $datetime = new DateTime();
                                $timezone = new DateTimeZone('Europe/Belgrade');
                                $datetime->setTimezone($timezone);
                                echo $datetime->format('F d, Y H:i');
                                ?>
                            </li>
                        </ul>
                        <div>
                            <a class="navbar-brand" href="../index.php"><img style="margin-top: -50px; margin-left: -170px" src="./assets/images/logo.png" alt=""/></a>
                        </div>
                        <div class="d-flex">
                             <ul class="nav navbar-nav navbar-right">
                                 <?php if (!isset($_SESSION['user'])){ ?>
                                <li><a href="pages/registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="pages/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                 <?php } ?>
                                 <?php if (isset($_SESSION['user']) && $_SESSION['user']['role']=='user'){?>
                                 <li><a href="pages/UserProfile.php?id=<?=$_SESSION['user']['id']?>"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['user']['username']?></a></li>
                                     <li><a href="../pages/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                                 <?php } ?>
                                 <?php if (isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){?>
                                     <li><a href="../pages/UserProfile.php?id=<?=$_SESSION['user']['id']?>"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['user']['username']?></a></li>
                                     <li><a href="pages/adminPage.php"><span class="glyphicon glyphicon-log-in"></span>Admin page</a></li>
                                     <li><a href="../pages/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                                 <?php } ?>
                                 <?php if (isset($_SESSION['user']) && $_SESSION['user']['role']=='author'){?>
                                     <li><a href="pages/UserProfile.php?id=<?=$_SESSION['user']['id']?>"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['user']['username']?></a></li>
                                     <li><a href="../pages/newPost.php"><span class="glyphicon glyphicon-log-in"></span>New Post</a></li>
                                     <li><a href="../pages/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                                 <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-bottom-menu">
                        <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center" >
                                <li class="nav-item active">
                                    <a class="nav-link active" href="../index.php">Home</a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link" href="">Galery</a>
                                </li>
                                <?php foreach ($first8categories as $data) {?>
                                <li class="nav-item" >
                                    <a class="nav-link" href="../pages/newsBySport.php?sportId=<?=$data['id']?>"><?=$data['name']?></a>
                                </li>
                                <?php } ?>

                                <li class="nav-item" >
                                    <a class="nav-link"  style="cursor: pointer" onclick="showList()">More &#9662;</a>
                                </li>


                            </ul>
                        </div>
                        <div class="other-categories">
                            <ul>
                                <?php foreach ($otherCategories as $data){?>
                                <li class="nav-item"><?=$data['name']?><hr></li>
                               <?php } ?>

                            </ul>
                        </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    <script>
        function showList(){
            let list=$(".other-categories");
            list.toggle();
        }
    </script>
