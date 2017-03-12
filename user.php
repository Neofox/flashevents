<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flashevents - User</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
