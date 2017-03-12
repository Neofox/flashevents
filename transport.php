<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transport</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .map {
            max-width: 450px;
        }

        .progress-bar-vertical {
            width: 30px;
            height: 422px;
            display: inline-block;
            position:relative;
        }
        .progress-bar-vertical .progress-bar {
            width: 100%;
            height: 0;
            -webkit-transition: height 0.6s ease;
            -o-transition: height 0.6s ease;
            transition: height 0.6s ease;
            bottom: 0;
            position: absolute;
        }
         #header
         {
             width:100%;
             height:50px;
             background-color:#555;
             position: relative;
             z-index:2;
         }

        label[for=menuToggle]{
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            height: 50px;
            padding: 14px 10px;
        }

        label[for=menuToggle] span{
            display: block;
            width:100%;
            border: 2px solid #FFF;
            -webkit-border-radius:2px;
            -moz-border-radius:2px;
            -ms-border-radius:2px;
            -o-border-radius:2px;
            border-radius:2px;
        }

        label[for=menuToggle] span + span{
            margin-top: 4px;
        }

        #menuToggle {
            display: inline-block;
            position: absolute;
            top: 12px;
            left: 12px;
        }

        #menuToggle input
        {
            display: block;
            width: 40px;
            height: 32px;
            position: absolute;
            cursor: pointer;
            opacity: 0;
            z-index: 2;
            -webkit-touch-callout: none;
        }

        #menuToggle span
        {
            display: block;
            width: 33px;
            height: 4px;
            margin-bottom: 5px;
            position: relative;

            background: #cdcdcd;
            border-radius: 3px;

            z-index: 1;
        }

        #menu {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            padding: 100px 50px 50px 50px;
            max-width: 320px;
            background: #ededed;
            box-sizing: border-box;
            -webkit-transition:.2s;
            -moz-transition:.2s;
            -ms-transition:.2s;
            -o-transition:.2s;
            transition:.2s;
            z-index: 1;
        }

        #menuToggle:checked + #menu{
            left: 0;
        }

        #menu li
        {
            padding: 10px 0;
            font-size: 22px;
        }

        #menuToggle input:checked ~ ul
        {
            transform: scale(1.0, 1.0);
            opacity: 1;
        }

        #toggle_filters:checked + .panel_right_slide{
            right: 0%;
        }

        label[for=toggle_filters]{
            position: absolute;
            top:50px;
            right:0;
            padding:1.2em 1.4em;
            background:#2185d0;
            cursor:pointer;
            z-index:999;
        }

        .panel_right_slide{
            position: absolute;
            top: 50px;
            right: -100%;
            padding: 50px;
            display: block;
            max-width: 320px;
            width: 100%;
            height: 100%;
            background: #FFF;
            box-sizing: border-box;
            -webkit-transition: .2s;
            z-index: 99;
        }

        .panel_right_slide li{
            position: relative;
            padding:.5em;
            font-size:1.2em;
            color:#343434;
            cursor:pointer;
        }

        .panel_right_slide li:hover{
            color: #2185d0;
        }

        .panel_right_slide li>input{
            position: absolute;
            top:12px;
            right:0;
        }
    </style>
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <h3>Nearby transports</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <div style="display:inline-block;">
                    <button type="button" class="btn btn-success">
                        <i class="fa fa-street-view"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-bicycle"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-bus"></i>
                    </button>
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-train"></i>
                    </button>
                    <button type="button" class="btn btn-default disabled">
                        <i class="fa fa-car"></i>
                    </button>
                </div>
            </div>
        </div>
        <br />
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align:center;">
            <div style="display: inline-block;">
                <div class="progress progress-bar-vertical">
                    <i class="fa fa-tachometer"></i>
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="height: 30%;">
                        <span class="sr-only">30% Complete</span>
                    </div>
                </div>
                <img class="map" alt="map" src="images/gmaps.png" style="vertical-align: top;"/>
                <div class="progress progress-bar-vertical">
                    <i class="fa fa-sun-o"></i>
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="height: 70%;">
                        <span class="sr-only">70% Complete</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12" style="text-align:center;">
            <button style="display:inline-block;width:200px" type="button" class="btn btn-lg btn-primary">Go</button>
        </div>
    </div>
</div>