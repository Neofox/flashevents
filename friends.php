<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Friends</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
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
                <div class="col-md-12">
                        <h3>
                                Invite A friend
                        </h3>
                        <div class="row">
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg">
                                                <div class="caption">
                                                        <h3>
                                                                Add Jerome
                                                        </h3>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg">
                                                <div class="caption">
                                                        <h3>
                                                                Add Adrien
                                                        </h3>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg">
                                                <div class="caption">
                                                        <h3>
                                                                Add Emeline
                                                        </h3>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
