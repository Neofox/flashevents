<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flashevents - User</title>
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
                        <br><br><br>
                        <h3>
                                User Profile
                        </h3>
                        <form class="form-horizontal" role="form">
                                <div class="form-group">
                                         
                                        <label for="inputEmail3" class="col-sm-2 control-label">
                                                Firtsname
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputFirstname" readonly>
                                        </div>
                                </div>
                                <div class="form-group">
                                         
                                        <label for="inputEmail3" class="col-sm-2 control-label">
                                                Lastname
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputLastname" readonly>
                                        </div>
                                </div>
                                <div class="form-group">
                                         
                                        <label for="inputEmail3" class="col-sm-2 control-label">
                                                Email
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" readonly>
                                        </div>
                                </div>
                                <div class="form-group">
                                         
                                        <label for="inputNAME" class="col-sm-2 control-label">
                                                City
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputCity">
                                        </div>
                                </div>
                                <div class="form-group">

                                        <label for="inputNAME" class="col-sm-2 control-label">
                                                Zipcode
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputZipcode">
                                        </div>
                                </div>
                                <div class="form-group">

                                        <label for="inputNAME" class="col-sm-2 control-label">
                                                Streetname
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputStreetname">
                                        </div>
                                </div>
                                <div class="form-group">

                                        <label for="inputNAME" class="col-sm-2 control-label">
                                                Streetnumber
                                        </label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputStreetnumber">
                                        </div>
                                </div>
                                <input type="hidden" id="addressid">
                                <input type="hidden" id="lat"><input type="hidden" id="lot">
                                <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                                 
                                                <button id="sendSubmit" type="submit" class="btn btn-default">
                                                        Submit
                                                </button>
                                        </div>
                                </div>
                        </form>
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
            url: 'http://flashevents.flash-global.net/backend/api/users/' + id,
            complete : function(data){
                console.log(data.responseJSON[0]);
                var response = data.responseJSON[0];

                $("#addressid").val(response.address.id);
                $("#lat").val(response.address.latitude);
                $("#lot").val(response.address.longitude);
                $("#inputFirstname").val(response.fisrtName);
                $("#inputLastname").val(response.lastName);
                $("#inputEmail").val(response.email);
                $("#inputCity").val(response.address.city);
                $("#inputZipcode").val(response.address.zipCode);
                $("#inputStreetname").val(response.address.streetName);
                $("#inputStreetnumber").val(response.address.streetNumber)

            }
        });


        $("#sendSubmit").click(function (e) {
            e.preventDefault();

            
            $.ajax({
                    url: 'http://flashevents.flash-global.net/backend/api/users/' + id + '/addresses',
                    method: 'PUT',
                    data: {
                        address: {
                            id: $("#addressid").val(),
                            city: $("#inputCity").val(),
                            zipCode: $("#inputZipcode").val(),
                            streetName: $("#inputStreetname").val(),
                            streetNumber: $("#inputStreetnumber").val(),
                            latitude: $("#lat").val(),
                            longitude: $("#lot").val()
                        },
                    },
               });
        });
        

    </script>
  </body>
</html>
