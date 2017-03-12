<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <style>
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

        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="semantic/dist/semantic.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="header">
            <label for="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <input id="menuToggle" class="hidden" type="checkbox" />
        <ul id="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </body>
</html>
