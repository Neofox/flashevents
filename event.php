<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Event</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/template/event.css" />
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css" />
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="semantic/dist/semantic.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                function getQueryParams() {

                    var query = document.location.search;
                    query = query.split('+').join(' ');

                    var params = {},
                        tokens,
                        re = /[?&]?([^=]+)=([^&]*)/g;

                    while (tokens = re.exec(query)) {
                        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
                    }

                    return params;
                }

                var getParameters = getQueryParams();

                $.ajax({
                    type: 'get',
                    data: getParameters
                }).fail(function(result) {

                }).
                }done(function(result){

                });

            });
        </script>
    </head>
    <body>
        <div class="ui container grid">
            <div class="">
                <img class="ui image fluid" src="images/" alt="" />
            </div>
            <div class="ui list">
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        27 Rue Philippe II,<br/>
                        L-2340 Luxembourg<br/>
                        Luxembourg
                    </div>
                </div>
                <div class="item">
                    <i class="wait icon"></i>
                    <div class="content">
                        2017-03-12 18:00
                    </div>
                </div>
                <div class="item">
                    <i class="mail icon"></i>
                    <div class="content">
                        <a href="tel:+352 062 222">+352 062 222</a>
                    </div>
                </div>
                <div class="item">
                    <i class="street view icon"></i>
                    <div class="content">
                        6 km
                    </div>
                </div>
                <div class="item">
                    <i class="linkify icon"></i>
                    <div class="content">
                        <a href="//city.snooze.pub">city.snooze.pub</a>
                    </div>
                </div>
            </div>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Maecenas tempus lectus id urna porttitor, ut aliquam nulla mattis.
                Phasellus eu suscipit sapien. Donec vel commodo neque,
                ac blandit dolor.
            </div>
        </div>
    </body>
</html>