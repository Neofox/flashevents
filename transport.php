<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                    <i class="icon-dashboard"></i>
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="height: 30%;">
                        <span class="sr-only">30% Complete</span>
                    </div>
                </div>
                <img class="map" alt="map" src="images/gmaps.png" style="vertical-align: top;"/>
                <div class="progress progress-bar-vertical">
                    <i class="icon-sun"></i>
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