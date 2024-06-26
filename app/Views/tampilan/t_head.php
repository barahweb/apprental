<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MTG Trans</title>

    <!-- Custom fonts for this template-->
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href=" <?= base_url(); ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link rel="shortcut icon" href="<?= base_url() ?>/img/Logo.jpg" />
    <link href="<?= base_url(); ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url(); ?>/template/vendor/jquery/my.js"></script>
    <style>
        .tengah {
            text-align: center;
        }
    </style>
    <style>
        #printOnly {
            display: none;
        }

        @media print {

            #printOnly,
            .fot,
            .kanan {
                display: block !important;
            }

            .card {
                border: 0;
            }
        }
    </style>
    <style>
        /*----------------------------------------------
Author : www.webthemez.com
License: Commons Attribution 3.0
http://creativecommons.org/licenses/by/3.0/
------------------------------------------------*/


        /*----------------------------------------------
    COMMON  STYLES    
------------------------------------------------*/
        body {
            font-family: 'Open Sans', sans-serif;
        }

        #wrapper {
            width: 100%;
            background: #09192A;
        }

        #page-wrapper {
            padding: 15px 15px;
            min-height: 600px;
            background: #E5EBF2;

        }

        #page-inner {
            width: 100%;
            margin: 10px 20px 10px 0px;
            background-color: transparent;
            padding: 10px;
            min-height: 1200px;
        }

        .text-center {
            text-align: center;
        }

        .no-boder {
            border: 1px solid #f3f3f3;
        }

        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3 {
            margin-top: 7px;
            margin-bottom: -5px;
        }

        h2 {
            color: #000;
        }

        h4 {
            padding-top: 10px;
        }

        .square-btn-adjust {
            border: 0px solid transparent;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;

        }

        p {
            font-size: 16px;
            line-height: 25px;
            padding-top: 20px;
        }

        /*----------------------------------------------
   DASHBOARD STYLES    
------------------------------------------------*/
        .page-header {
            padding-bottom: 9px;
            margin: 10px 0 45px;
            border-bottom: 1px solid #C7D1DD;
        }

        .panel-back {
            background-color: #fff;

        }

        .panel-default>.panel-heading {
            color: #000;
            background-color: #FFFFFF;
            border-color: #ddd;
            font-weight: bold;
        }

        .jumbotron,
        .well {
            background: #fff;
        }

        .noti-box {
            min-height: 100px;
            padding: 20px;
        }

        .noti-box .icon-box {
            display: block;
            float: left;
            margin: 0 15px 10px 0;
            width: 70px;
            height: 70px;
            line-height: 75px;
            text-align: center;
            font-size: 40px;
        }

        .text-box p {
            margin: 0 0 3px;
        }

        .main-text {
            font-size: 25px;
            font-weight: 600;
        }

        .set-icon {
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;

        }

        .bg-color-green {
            background-color: #fff;
            color: #5cb85c;
        }

        .bg-color-blue {
            background-color: #fff;
            color: #4CB1CF
        }

        .bg-color-red {
            background-color: #fff;
            color: #F0433D;
        }

        .bg-color-brown {
            background-color: #fff;
            color: #f0ad4e;
        }

        .back-footer-green {
            background-color: #5cb85c;
            color: #fff;
            border-top: 0px solid #fff;
        }

        .back-footer-red {
            background-color: #F0433D;
            color: #fff;
            border-top: 0px solid #fff;
        }

        .back-footer-blue {
            background-color: #4CB1CF;
            color: #fff;
            border-top: 0px solid #fff;
        }

        .back-footer-brown {
            background-color: #f0ad4e;
            color: #fff;
            border-top: 0px solid #fff;
        }

        .icon-box-right {
            display: block;
            float: right;
            margin: 0 15px 10px 0;
            width: 70px;
            height: 70px;
            line-height: 75px;
            text-align: center;
            font-size: 40px;
        }

        .main-temp-back {
            background: #8702A8;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 300;
            text-align: center;
        }

        .main-temp-back .text-temp {
            font-size: 40px;
        }

        .back-dash {
            padding: 20px;
            font-size: 20px;
            font-weight: 500;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            background-color: #2EA7EB;
            color: #fff;
        }

        .back-dash p {
            padding-top: 16px;
            font-size: 13px;
            color: #fff;
            line-height: 25px;
            text-align: justify;
        }

        .color-bottom-txt {
            color: #000;
            font-size: 16px;
            line-height: 30px;
        }

        /*CHAT PANEL*/
        .chat-panel .panel-body {
            height: 450px;
            overflow-y: scroll;
        }

        .chat-box {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .chat-box li {
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #808080;
        }

        .chat-box li.left .chat-body {
            margin-left: 90px;
        }

        .chat-box li .chat-body p {
            margin: 0;
            color: #8d8888;
        }

        .chat-img>img {
            margin-left: 20px;
        }

        footer p {
            font-size: 14px;
        }

        .user-image {
            margin: 25px auto;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            max-height: 170px;
            max-width: 170px;
        }

        .top-navbar {
            margin: 0px;
        }

        .top-navbar .navbar-brand {
            color: #fff;
            width: 260px;
            text-align: left;
            height: 60px;
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 30px;
        }

        .top-navbar .nav>li {
            position: relative;
            display: inline-block;
        }

        .top-navbar .nav>li>a {
            position: relative;
            display: block;
            padding: 19px 15px;
            color: #77C0FD;
        }

        .top-navbar .nav>li>a:hover,
        .top-navbar .nav>li>a:focus {
            text-decoration: none;
            background-color: #225081;
            color: #fff;
        }

        .top-navbar .dropdown-menu {
            min-width: 230px;
            border-radius: 0 0 4px 4px;
        }

        .top-navbar .dropdown-menu>li>a:hover,
        .top-navbar .dropdown-menu>li>a:focus {
            color: #225081;
            background: none;
        }

        .dropdown-tasks {
            width: 255px;
        }

        .dropdown-tasks .progress {
            height: 8px;
            margin-bottom: 8px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 0px;
        }

        .dropdown-tasks>li>a {
            padding: 0px 15px;
        }

        .dropdown-tasks p {
            font-size: 13px;
            line-height: 21px;
            padding-top: 4px;
        }

        .active-menu {
            background-color: #225081 !important;
        }

        .arrow {
            float: right;
        }

        .fa.arrow:before {
            content: "\f104";
        }

        .active>a>.fa.arrow:before {
            content: "\f107";
        }


        .nav-second-level li,
        .nav-third-level li {
            border-bottom: none !important;
        }

        .nav-second-level li a {
            padding-left: 37px;
        }

        .nav-third-level li a {
            padding-left: 55px;
        }

        .sidebar-collapse,
        .sidebar-collapse .nav {
            background: none;
        }

        .sidebar-collapse .nav {
            padding: 0;
        }

        .sidebar-collapse .nav>li>a {
            color: #fff;
            background: transparent;
            text-shadow: none;

        }

        .sidebar-collapse>.nav>li>a {
            padding: 15px 10px;
        }

        .sidebar-collapse>.nav>li {
            border-bottom: 1px solid rgba(107, 108, 109, 0.19);
        }

        ul.nav.nav-second-level.collapse.in {
            background: #172D44;
        }

        .sidebar-collapse .nav>li>a:hover,
        .sidebar-collapse .nav>li>a:focus {

            outline: 0;
        }

        .navbar-side {
            border: none;
            background-color: transparent;

        }

        .top-navbar {
            background: #09192A;
            border-bottom: none;

        }

        .top-navbar .nav>li>a>i {
            margin-right: 2px;
        }

        .top-navbar .navbar-brand:hover {
            color: #fd9944;

        }

        .dropdown-user li {
            margin: 8px 0;
        }

        .navbar-default {
            border: 0px;

        }

        .navbar-header {
            background: #09192A;
        }

        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: #fd9944;
        }

        .navbar-default .navbar-toggle {
            border-color: #fff;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #FFF;
        }

        .nav>li>a>i {
            margin-right: 10px;
        }

        /*----------------------------------------------
    UI ELEMENTS STYLES     
------------------------------------------------*/
        .btn-circle {
            width: 50px;
            height: 50px;
            padding: 6px 0;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            text-align: center;
            font-size: 12px;
            line-height: 1.428571429;
        }

        /*----------------------------------------------
    MEDIA QUERIES     
------------------------------------------------*/

        @media(min-width:768px) {
            #page-wrapper {
                margin: 0 0 0 260px;
                padding: 15px 30px;
                min-height: 1200px;

            }


            .navbar-side {
                z-index: 1;
                position: absolute;
                width: 260px;
            }

            .navbar {
                border-radius: 0px;
            }

        }

        @media(max-width:480px) {
            .page-header small {
                display: block;
                padding-top: 14px;
                font-size: 19px;
            }
        }

        .panel-body {
            padding: 15px;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
    </style>
    <style>
        @media print {
            @page {
                margin-top: 30px;
                margin-bottom: 10px;
            }

            .card .card-header,
            .navbar-nav,
            .breadcrumb .breadcrumb-item,
            #shift,
            .btn,
            .sticky-footer,
            .container-fluid .mt-4,
            input[type=date],
            label[for="tanngalawal"],
            label[for="tanggalawal"],
            #tanggalawal,
            #tanggalakhir,
            .col-sm-4,
            .m-0,
            .dataTables_filter,
            .dataTables_paginate,
            .dataTables_info,
            .dataTables_length,
            .dataTables_ordering,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_desc:before,
            #dataTable tr td:nth-child(1),
            #dataTable tr th:nth-child(1) {
                display: none;
            }
        }

        .card {
            border: 0;
        }

        .card-body {
            border: 0;
        }
    </style>
</head>