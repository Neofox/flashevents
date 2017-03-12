<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Title</title>
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <style>
            /*
            .map_filters_container{
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                z-index:99;
            }*/

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
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="semantic/dist/semantic.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(event){

            });
        </script>
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        <label for="toggle_filters">Filters</label>
        <input id="toggle_filters" class="hidden" type="checkbox" />
        <div class="panel_right_slide">
            <ul>
                <li>
                    <label for="toggle_filter_university">
                        <i class="icon university"></i>
                        Culture
                    </label>
                    <input id="toggle_filter_university" type="checkbox"/>
                </li>
                <li>
                    <label for="toggle_filter_food">
                        <i class="icon food"></i>
                        Restaurant
                    </label>
                    <input id="toggle_filter_food" type="checkbox"/>
                </li>
                <li>
                    <label for="toggle_filter_sport">
                        <i class="icon heartbeat"></i>
                        Sport
                    </label>
                    <input id="toggle_filter_sport" type="checkbox"/>
                </li>
                <li>
                    <label for="toggle_filter_cocktail">
                        <i class="icon cocktail"></i>
                        Nightlight
                    </label>
                    <input id="toggle_filter_cocktail" type="checkbox"/>
                </li>
                <li>
                    <label for="toggle_filter_users">
                        <i class="icon users"></i>
                        Meetups
                    </label>
                    <input id="toggle_filter_users" type="checkbox"/>
                </li>
            </ul>
        </div>
        <div id='map' style="min-width:100%;min-height:100%;"></div>
        <script type="text/javascript">
            var GoogleMapsInit = (function(){
                "use strict";

                var asyncLoad = function(u, c) {
                    var d = document, t = 'script',
                            o = d.createElement(t),
                            s = d.getElementsByTagName(t)[0];
                    o.src = u;
                    if (c) { o.addEventListener('load', function (e) { c(null, e); }, false); }
                    s.parentNode.insertBefore(o, s);
                };

                var initialize = function(target, addresses, config, GoogleMapsIntegration, google) {
                    var gmi = new GoogleMapsIntegration(google.maps,
                            new google.maps.Map(target, {
                                zoom: config.zoomFactor,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                center : new google.maps.LatLng(49.611622, 6.131935),
                                //todo debug
                                // typeof config.mapCenter !== "undefined" ? new google.maps.LatLng(config.mapCenter) : null,
                                mapTypeControl: true,//according to doc, it is not really available
                                overviewMapControl: true,
                                overviewMapControlOptions: { opened : true }//from v2 v3 example
                            }),
                            {
                                'MAPFILES_URL': config.MAPFILES_URL,
                                'shadow': typeof config.markerShadow !== "undefined" ? config.markerShadow : null,//null is default
                                'clickIcon': typeof config.markerClickIcon !== "undefined" ? config.markerClickIcon : null//null is default
                            }
                    );

                    addAdresses(gmi, addresses, config);

                    return gmi;
                };

                var addAdresses = function(gmi, addresses, config) {
                    var extraMarkerParams = {
                        draggable: typeof config.draggable !== "undefined" ? config.draggable : true,
                        center: typeof config.center !== "undefined" ? config.center : true,
                        infoWindow : typeof config.infoWindow !== "undefined" ? config.infoWindow : true
                        //infoWindowTitle : typeof config.infoWindowTitle !== "undefined" ? config.infoWindowTitle : undefined
                    };
//todo title?
                    for (var i = 0; i < addresses.length; i++) {
                        if (typeof addresses[i].lat === "undefined" || typeof addresses[i].lng === "undefined") {
                            gmi.searchAndMark({
                                        query: addresses[i].searchAddress
                                    },
                                    addresses[i].title,
                                    extraMarkerParams,
                                    function(response) {
                                        if (response.status === gmi.service.places.PlacesServiceStatus.ZERO_RESULTS) {
                                            alert ('Address not found : ' + response.params.query);// TODO remove Alert whenever we have a Modal Component
                                        }
                                        else {
                                            console.log(response, 'debugging PlacesService bad failure, the response contains the query params');
                                            alert("Something went wrong, please try later");// TODO remove Alert whenever we have a Modal Component
                                        }
                                    }
                            );
                        }
                        else {
                            gmi.addMarker({
                                        lat : parseFloat(addresses[i].lat),
                                        lng : parseFloat(addresses[i].lng)
                                    },
                                    addresses[i].title,
                                    extraMarkerParams
                            );
                        }
                    }
                };

                return {
                    asyncLoad : asyncLoad,
                    initialize : initialize,
                    addAdresses : addAdresses
                };
            })();

            var GoogleMapsIntegration = (function(){
                "use strict";

                /*
                 * constructor for GoogleMapsIntegration object.
                 */
                function GoogleMapsIntegration(service, map, config) {
                    this.service = service;
                    this.map = map;
                    this.markers = [];
                    this.config = config;

                    this.geocoder = new this.service.Geocoder();
                    this.directionRouting = new this.service.DirectionsService();
                    this.directionsDisplay = new this.service.DirectionsRenderer();

                    this.directionsDisplay.setMap(this.map);

                    this.placesSearch = new this.service.places.PlacesService(this.map);
                }

                /* adds a preconfigured marker at position with title on this.map , additionalParams being optional*/
                GoogleMapsIntegration.prototype.addMarker = function(position, title, additionalParams) {
                    var defaultParams = {
                        'position': position,
                        'map': this.map,
                        'title': title,
                        'clickable': true,
                        'icon': this.config.clickIcon,
                        'shadow': this.config.shadow
                    };
                    if (additionalParams && additionalParams.draggable) {
                        defaultParams.draggable = true;
                    }

                    var newMarker = new this.service.Marker(defaultParams);

                    if (newMarker && additionalParams) {
                        if (additionalParams.center) {
                            //this.map.setCenter(position);//fixme ignored
                        }
                        if (additionalParams.infoWindow) {
                            var thisGMI = this;
                            newMarker.infoWindow = new this.service.InfoWindow({
                                content: additionalParams.infoWindowTitle ? additionalParams.infoWindowTitle : title
                            });
                            this.service.event.addListener(newMarker, 'click', function() {
                                for (var markerIndex = 0;  markerIndex < gmi.markers.length; markerIndex++) {
                                    if (gmi.markers[markerIndex].infoWindow) {
                                        // autoclose anything opened. Ruled out deleting the key, checking on active element, or closing an opened one on click instead of reopening
                                        gmi.markers[markerIndex].infoWindow.close();
                                    }
                                }
                                newMarker.infoWindow.open(thisGMI.map, newMarker);
                            });
                        }
                    }
                    this.markers.push(newMarker);
                    return newMarker;
                };

                /* Removes the last marker */
                GoogleMapsIntegration.prototype.cancelLast = function() {
                    var last = this.markers.pop();
                    if (last !== undefined) {
                        last.setMap(null);
                    }
                };

                GoogleMapsIntegration.prototype.clearMap = function() {
                    // duh
                    for (var i = this.markers.length - 1; i > 0; i--) {
                        this.cancelLast();
                    }
                };

                // only for PRECISE adresses , as { 'address': location }, or lat&lng from gmaps requests
                GoogleMapsIntegration.prototype.geopromise  = function(params, container) {
                    var that = this;
                    return new Promise(function(resolve, reject) {

                        that.geocoder.geocode(params, function(results, status) {
                            if (status === that.service.GeocoderStatus.OK) {
                                if (results && results.length) {
                                    resolve({result : results[0], container : container, status : status});
                                    return;
                                }
                            }
                            reject({result : results, container : container, status : status});
                        });
                    });
                };

                GoogleMapsIntegration.prototype.route = function(params) {
                    var that = this;
                    return new Promise(function(resolve, reject) {
                        that.directionRouting.route(params, function (response, status) {
                            if (status == that.service.DirectionsStatus.OK) {
                                resolve({response: response, status: status});
                                return;
                            }
                            reject({response: response, status: status});
                        });
                    });
                };


                // uses textSearch, see https://developers.google.com/places/web-service/search#TextSearchRequests
                GoogleMapsIntegration.prototype.search = function(params) {
                    var that = this;
                    return new Promise(function(resolve, reject) {
                        that.placesSearch.textSearch(params, function (response, status) {
                            if (status == that.service.places.PlacesServiceStatus.OK && response.length) {
                                resolve({results: response, status: status, service: that});
                                return;
                            }
                            reject({response: response, status: status, service: that, params : params});//nothing found
                        });
                    });
                };

                /* place text search, then marks on this.map, knowing markerTitle & markerParams, or reject with rejectHandler */
                GoogleMapsIntegration.prototype.searchAndMark = function(params, markerTitle, markerParams, rejectHandler) {
                    this.search(params)
                            .then(function(response) {
                                // by default, just add the first marker.
                                response.service.addMarker(
                                        response.results[0].geometry.location,
                                        markerTitle ? markerTitle : response.results[0].formatted_address,
                                        markerParams
                                );
                            }).catch(rejectHandler);
                };

                return GoogleMapsIntegration;
            })();

            //var placesLink = "https://maps.googleapis.com/maps/api/js?v=3&library=places";
            var placesLink = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCfqJpSQKXiigevCabsliVlFFvkgTYuNfM&libraries=places";
            var addresses = [];
            var events = {};
            var gmiConfig = {
                MAPFILES_URL: "http://maps.gstatic.com/intl/en_us/mapfiles/",
                zoomFactor : 9,
                draggable: false,
                mapCenter: false,
                //mapCenter : {latitude : 49.611622, longitude : 6.131935}//Lux-city//todo make it work from there
            };
            var gmi;

            (function(target, addresses, config, GoogleMapsInit, GoogleMapsIntegration){// asap
                //GoogleMapsInit comes from googleMapsDefaultInit
                GoogleMapsInit.asyncLoad(placesLink, function() {// when maps with places are loaded
                    gmi = GoogleMapsInit.initialize(target, addresses, config, GoogleMapsIntegration, google);// then initialize the map
                    loadEvents();
                });
            })(document.getElementById("map"), addresses, gmiConfig, GoogleMapsInit, GoogleMapsIntegration, loadEvents);

            var loadEvents = function(params) {
                $.get({
                    url : 'http://flashevents.flash-global.net/backend/api/events',
                    data : params || {
                        limit : 15
                    },//todo params//lol
                    dataType : 'json',
                    success : function(raw) {
                        if (!raw.length) {
                            return false;
                        }
                        window.events = raw;
                        var data = [];
                        for (var i = 0; i < window.events.length - 1; i++) {
                            var event = window.events[i];
                            data.push({
                                'title' : event.description || event.name ,
                                'infoWindowTitle' : event.description || event.name,
                                'address' : event.address || undefined,
                                'lat' : typeof event.address.latitude !== "undefined" ?  event.address.latitude : undefined,
                                'lng' : typeof event.address.longitude !== "undefined" ?  event.address.longitude : undefined
                            });
                        }
                        if (data.length) {
                            gmi.clearMap();
                            GoogleMapsInit.addAdresses(window.gmi, data, window.gmiConfig);
                        }
                    }
                });
            };
        </script>
    </body>
</html>