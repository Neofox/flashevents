<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>FlashEvents - Connexion</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css" />
        <style media="screen">
            .login{
                background: #053456;
                color:#FFF;
            }

            .ui.form .field>label.hidden{
                display:none;
            }

            .login .ui.container{
                width:400px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="semantic/dist/semantic.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                console.log("ready");

                $('form').submit(function(event){
                    var _this = $(this);
                    var data = _this.serialize();
                    var method = _this.get(0).method;
                    var url = _this.get(0).action;

                    $.ajax({
                        url: url,
                        type: method,
                        data: data
                    })
                    .fail(function(result){
                        alert('fuck you');
                    })
                    .done(function(result){
                        window.location.replace("http://localhost:5555/map.php");
                    });

                     event.preventDefault();
                     return false;
                });

            });
        </script>
    </head>
    <body class="login">
    <?php include_once 'header.php'; ?>
        <div class="container ui center aligned">
            <form class="ui form" action="http://flashevents.flash-global.net/backend/login" data-redirection="map.html" method="POST">
                <div class="message"></div>
                <img id="logo" class="" src="images/logo.svg" alt=""/>
                <div class="field ui left icon input fluid">
                    <i class="icon user"></i>
                    <input id="email" placeholder="Username" type="text" name="email" />
                </div>
                <div class="field ui left icon input fluid">
                    <i class="lock icon"></i>
                    <input id="password" placeholder="Password" type="password" name="password" />
                </div>
                <div class="field">
                    <button type="submit" class="ui primary submit button fluid">
                        Sign in
                    </button>
                </div>
                <a href="#">Need help ?</a>
            </form>
            <div class="ui horizontal divider">or</div>
            <a href="#">Connect with facebook</a>
            <div class="ui horizontal divider"></div>
            <a href="#">Sign up</a>
            <img id="logoLux" class="ui centered tiny image" src="images/MadeInLux_logo.svg" alt="Made in Luxembourg"/>
        </div>
    </body>
</html>
