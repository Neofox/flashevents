<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event details</title>

    <meta name="author" content="Flashevents">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<?php include_once 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="http://flashevents.flash-global.net/map.php">Flash Events</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="http://flashevents.flash-global.net/event.html">Event</a>
                        </li>
                        <li>
                            <a href="http://flashevents.flash-global.net/map.php">Map</a>
                        </li>
                        <li>
                            <a href="http://flashevents.flash-global.net/user.html">User</a>
                        </li>
                        <li>
                            <a href="http://flashevents.flash-global.net/friends.html">Freinds</a>
                        </li>
                        <li>
                            <a href="http://flashevents.flash-global.net/transport.html">Transport</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12"><br><br><br></div>
        <div class="col-md-12">
            <h2 id="title" class="text-primary">
                Event details
            </h2>
            <img alt="event image" src="http://lorempixel.com/140/140/" class="img-thumbnail">
            <address>
                <strong id="event-name">Twitter, Inc.</strong>
                <br>
                <span id="event-street-number">795</span>
                <span id="event-street-name">Folsom Ave, Suite 600</span><br>
                <span id="event-city">San Francisco</span>,
                <span id="event-zipcode">CA 94107</span><br>
            </address>
            <dl id="event-description">
            </dl>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script type="application/javascript">
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    var id = findGetParameter('id');

    $.ajax({
        url: 'http://flashevents.flash-global.net/backend/api/events/' + id,
        complete : function(data){
            console.log(data.responseJSON[0]);
            var response = data.responseJSON[0];

            //$("#title").html(response.name + "  details");
            //$(".img-thumbnail").attr('src', response.picture)

            $("#event-name").html(response.name);
            $("#event-city").html(response.address.city);
            $("#event-street-name").html(response.address.streetName);
            $("#event-street-number").html(response.address.streetNumber);
            $("#event-zipcode").html(response.address.zipCode);

            $("#event-description").html(response.description);

        }
    });
</script>
</body>
</html>