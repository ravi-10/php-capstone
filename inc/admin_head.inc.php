<?php
    /**
     * Admin Head Include Page 
     * last_update: 2019-09-04
     * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
     */
?><!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="css/spur.css">
        <link rel="stylesheet" href="css/admin.css">
        <title><?=esc($title)?></title>

        <!--
    
            11111111111111111111111111111111111111111111111111
            11111111111111111111111111111111111111111111111111
            11111111111111111111111111111111111111111111111111
            1111        1111111  111111  111111  111      1111
            1111  11111  11111    11111  111111  11111  111111
            1111  11111  1111  11  1111  111111  11111  111111
            1111  11111  111  1111  111  111111  11111  111111
            1111  11   11111  1111  1111  1111  111111  111111
            1111  111  11111        11111  11  1111111  111111
            1111  1111  1111  1111  11111  11  1111111  111111
            1111  11111  111  1111  111111    111111      1111
            11111111111111111111111111111111111111111111111111
            11111111111111111111111111111111111111111111111111
            11111111111111111111111111111111111111111111111111
            11                                              11
            11        Name     : Ravi Patel                 11
            11        Program  : WDD - January 2019         11
            11                                              11
            11111111111111111111111111111111111111111111111111

            -->
    </head>

    <body>
        <div class="dash">
            <div class="dash-nav dash-nav-dark">
                <header>
                    <a href="#!" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </a>
                    <a href="index.php" class="spur-logo"><i class="fas fa-globe"></i> <span>ATG Admin</span></a>
                </header>
                <?php
                    // including nav file
                    require 'admin_nav.inc.php';
                ?>
                
            </div>
            <div class="dash-app">
                <header class="dash-toolbar">
                    <a href="#" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </a>
                    <?php if(empty($_GET)): ?>
                    <form class="searchbox" method="post" action="<?=esc($_SERVER['PHP_SELF'])?>">
                        <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                        <input type="text" class="searchbox-input" placeholder="type to search from title" name="search">
                    </form>
                    <?php endif; ?>
                    <div class="tools">
                        <div class="dropdown tools-item">
                            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="../login.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="dash-content">
                    <div class="container-fluid">