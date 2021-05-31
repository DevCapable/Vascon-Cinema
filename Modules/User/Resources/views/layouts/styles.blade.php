<link rel="icon" href="../../../../favicon.ico">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{  asset('/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{  asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{  asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{  asset('/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{  asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{  asset('/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css')}}">


<style>
    #tagging {
        font-family: Exotc350 Bd BT;
        font-size: 30px;
    }

    #homename {
        font-family: Exotc350 Bd BT;
        font-size: 20px;
    }

    #twitter,
    #facebook,
    #linkedin,
    #google {
        background-color: #205d7a;
        color: #fff;
        width: 40px;
        height: 40px;
        top: 52px;
        border-radius: 40px;
        font-size: 25px;
        text-align: center;
        margin-right: 0px;
        padding-top: 02%;
        transition: all 0.2s eas-in-out;
    }

    #facebook:hover,
    #twitter:hover,
    #linkedin:hover,
    #google:hover {
        opacity: .7;


    }

    #twitter {
        background-color: #00aced;

    }

    #google {
        background-color: #dd4b39;

    }

    #facebook {
        background-color: #3b5998;

    }

    #linkedin {
        background-color: #007bb6;

    }

    #dropdown {
        background-color: #1f2e2e;
        color: #fff;
        border-bottom: 1px dotted #fff;
    }

    #dropdown:hover {
        color: #1affd1;
    }

    /* MY SIDEBAR*/
    #mySidenav a {
        position: fixed;
        left: -80px;
        transition: 0.3s;
        padding: 15px;
        padding-right: 20px;
        padding-left: 2px;
        z-index: 1;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
    }

    #mySidenav a:hover {
        left: 0;
    }

    #about {
        top: 140px;
        background-color: #4CAF50;
    }

    #map {
        top: 200px;
        background-color: #2196F3;
    }

    #projects {
        top: 260px;
        background-color: #ff66d9;
    }

    #developer {
        top: 320px;
        background-color: #f44336;
    }

    #contact {
        top: 380px;
        background-color: #555
    }
    ul {
        display: inline-flex;
        list-style: none;
        color: #fff;
        margin: 0px;
    
    }
    
    
    #twitterb, #facebookb, #linkedinb, #googleb {
        background-color:#205d7a;
        color: #fff;
        width: 40px;
        height: 40px;
        top: 50px;
        border-radius: 40px;
        font-size: 25px;
        text-align: center;
        margin-right: 0px;
        padding-top: 15%;
        transition: all 0.2s eas-in-out;       
    }
    #googleb:hover , #twitterb:hover , #linkedinb:hover , #facebookb:hover {
        color: red; background-color: #33ff77;
    }
    textarea{
        width: 100%;
    }
    </style>
