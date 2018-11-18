<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo SITE_NAME; ?></title>
<link rel="apple-touch-icon" sizes="57x57" href="/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
<link rel="manifest" href="/images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/application/resources/css/bootstrap.min.css" rel="stylesheet">
<link href="/application/resources/css/bootstrap-grid.min.css" rel="stylesheet">
<link href="/application/resources/css/metisMenu.min.css" rel="stylesheet">
<link href="/application/resources/css/sb-admin-2.css" rel="stylesheet">
<link href="/application/resources/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="/application/resources/css/dataTables.responsive.css" rel="stylesheet">
<link href="/application/resources/font-awesome/css/fontawesome.min.css" rel="stylesheet">
<link href="/application/resources/css/style.css" rel="stylesheet"> 
<script src="/application/resources/js/jquery-3.3.1.min.js"></script> 
<script src="/application/resources/js/jquery-ui.min.js"></script>   
<script src="/application/resources/js/jquery.dataTables.min.js"></script>  
<script src="/application/resources/js/dataTables.responsive.js"></script>
<script src="/application/resources/js/jquery-sortable.js"></script> 
<script src="/application/resources/js/bootstrap.min.js"></script>
<script src="/application/resources/js/metisMenu.min.js"></script>
<script src="/application/resources/js/sb-admin-2.js"></script> 
</head>
<body>
<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/product/mainPage"><?php echo $this->lang->line('nav_title'); ?></a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="<?php echo BASE_URL; ?>/product/list"><?php echo $this->lang->line('nav_products'); ?></a></li>
                        <li>
                            <a href="#"><?php echo $this->lang->line('nav_clients'); ?><span class="arrowDropRigth glyphicon glyphicon-option-vertical"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo BASE_URL; ?>/client/add/null"><?php echo $this->lang->line('nav_add_client'); ?></a></li>
                                <li><a href="<?php echo BASE_URL; ?>/client/list"><?php echo $this->lang->line('nav_list_client'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
            