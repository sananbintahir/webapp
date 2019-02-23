<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Volton Free Responsive Template</title>
        <meta name="description" content="">
        <!-- 
    	Volton Template
    	http://www.templatemo.com/tm-441-volton
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="assets/css1/normalize.css">
        <link rel="stylesheet" href="assets/css1/font-awesome.css">
        <link rel="stylesheet" href="assets/css1/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css1/templatemo-style.css">
        <script src="assets/js1/vendor/modernizr-2.6.2.min.js"></script>
        <style>
        * {
          box-sizing: border-box;
        }

        #myInput {
          background-image: url('/css/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }

        .myTable {
          border-collapse: collapse;
          width: 100%;
          border: 1px solid #ddd;
          font-size: 18px;
        }

        .myTable th, .myTable td {
          text-align: left;
          padding: 12px;
        }

        .myTable tr {
          border-bottom: 1px solid #ddd;
        }

        .myTable tr.header, .myTable tr:hover {
          background-color: #f1f1f1;
        }

        #map {
            height: 500px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
            margin-top: 5%
        }

        .selected {
            background-color: #f1f1f1;
        }
        </style>
    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
        <div class="responsive-header visible-xs visible-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-section">
                            <div class="profile-image">
                                <img src="assets/img/profile.jpg" alt="Volton" >
                            </div>
                           
                            <div class="profile-content">
                                
                                <h3 class="profile-title"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                <div class="main-navigation responsive-menu">
                    <ul class="navigation">
                        <li><a href="#top"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#about"><i class="fa fa-user"></i>Create Event</a></li>
                        <li><a href="#projects"><i class="fa fa-newspaper-o"></i>Join Event</a></li>
                        <li><a href="#joined"><i class="fa fa-envelope"></i>Joined Events</a></li>
                        <li><a href="#organized"><i class="fa fa-envelope"></i>Organized Events</a></li>
                        <li><a href="#contact"><i class="fa fa-envelope"></i>Feedback</a></li>
                        
                    </ul>
                </div>
                <div class="social-icons">
                <ul>
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>log out</a></li>
                </ul>
            </div> <!-- .social-icons -->
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="sidebar-menu hidden-xs hidden-sm">
            <div class="top-section">
                <div class="profile-image">
                    <img src="assets/img/profile.jpg" alt="Volton" >
                </div>
                <h3 class="profile-title"></h3>
                
            </div> <!-- top-section -->
            <div class="main-navigation">
                <ul class="navigation">
                    <li><a href="#top"><i class="fa fa-globe"></i>Welcome</a></li>
                    <li><a href="#about"><i class="fa fa-pencil"></i>Create Event</a></li>
                    <li><a href="#projects"><i class="fa fa-paperclip"></i>Join Event</a></li>
                    <li><a href="#joined"><i class="fa fa-envelope"></i>Joined Events</a></li>
                    <li><a href="#organized"><i class="fa fa-sitemap"></i>Organized Events</a></li>
                    <li><a href="#contact"><i class="fa fa-link"></i>Feedback</a></li>
                    
                </ul>
                <ul>
                    <li><a href="./logout.php"><i class="fa fa-sign-out"></i>log out</a></li>
                </ul>
            </div> <!-- .main-navigation -->
        </div> <!-- .sidebar-menu -->
        

        <div class="banner-bg" id="top">
            <div class="banner-overlay"></div>
            <div class="welcome-text">
                
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="fluid-container">

                <div class="content-wrapper">

                <div class="main">
                    <div class="page-section" id="map"></div>
                </div>

                <script>
            // Radius bar code
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value;
            slider.oninput = function() {
                output.innerHTML = this.value + "km";
            }

            // Default values from the form
            var dch1 = document.getElementById("choice1").value;
            var dminp = document.getElementById("minp").value;
            var dmaxp = document.getElementById("maxp").value;
            var dftime = document.getElementById("ftime").value;
            var dttime = document.getElementById("totime").value;
            var dloc = document.getElementById("location").value;
            var modal = document.getElementById('myModal');


            // Initialize and add the map
            function initMap() {

                var mark1loc = {
                    lat: 53.168726,
                    lng: 8.654232
                };
                var mark2loc = {
                    lat: 53.169030,
                    lng: 8.654240
                };
                var mark3loc = {
                    lat: 53.169030,
                    lng: 8.656240
                };
                // The map, centered at mark1loc
                var map = new google.maps.Map(
                    document.getElementById('map'), {
                        zoom: 16,
                        center: mark1loc
                    });

                // Creating the markers

                var marker1 = new google.maps.Marker({
                    position: mark1loc,
                    map: map,
                    choice: "Football",
                    minmumnumber: "10",
                    maxnumber: "12",
                    from: "18:00",
                    to: "20:00",
                    icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                });
                var marker2 = new google.maps.Marker({
                    position: mark2loc,
                    map: map,
                    choice: "Basketball",
                    minmumnumber: "12",
                    maxnumber: "14",
                    from: "19:00",
                    to: "21:00",
                    icon: 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png'
                });
                var marker3 = new google.maps.Marker({
                    position: mark3loc,
                    map: map,
                    choice: "Badminton",
                    minmumnumber: "8",
                    maxnumber: "10",
                    from: "15:00",
                    to: "17:00",

                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });
                var infowindow = new google.maps.InfoWindow({
                    content: ''

                });
                var markerset = [marker1, marker2, marker3];
            

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        var markerpos = new google.maps.Marker({
                            position: pos,
                            map: map,
                        });

                        map.setCenter(pos);
                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                    for (var i = 0; i < markerset.length; i++) {

                        placeMarker(map, mark1loc, markerset[i], infowindow);
                    }
                    var infowindow = new google.maps.InfoWindow();
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });

                    google.maps.event.addListener(map, 'click', function() {
                        infowindow.close();
                    });
                    marker.addListener('click', function() {
                        infowindow.setContent('<div class="suggeventtit">' +
                            'SPORT :' +
                            '<a>' + this.choice + '</a> ' +
                            '</div>' + '<div class="suggeventtit">' +
                            'TIME :' +
                            '<a>' + this.from + '</a> ' +
                            '</div>' +
                            '<div class="suggeventtit">' +
                            'MAX NUMBER :' +
                            '<a>' + this.maxnumber + '</a> ' +
                            '</div>' + '<div class="suggeventtit">' +
                            'ACTUAL NUMBER :' +
                            '<a>' + "" + '</a> ' +
                            '</div>' + '<div class="title2IB">' + ' JOIN ' +
                            '</div>');
                        infowindow.open(map, this);
                    });

                }

                function placeMarker(map, mark1loc, marker, infowindow) {
                    var ch1 = document.getElementById("choice1").value;
                    var ch2 = document.getElementById("choice2").value;
                    var ch3 = document.getElementById("choice3").value;
                    var minp = document.getElementById("minp").value;
                    var maxp = document.getElementById("maxp").value;
                    var ftime = document.getElementById("ftime").value;
                    var ttime = document.getElementById("totime").value;
                    var modal = document.getElementById('myModal');
                    var loc = document.getElementById("location").value;

                    if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == marker.minmumnumber && maxp == marker.maxnumber && ftime == marker.from && ttime == marker.to && loc == marker.to) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && loc == marker.to && minp == dminp && maxp == dmaxp && ftime == dftime && ttime == dttime) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == dminp && maxp == dmaxp && ftime == dftime && ttime == dttime) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == dminp && maxp == dmaxp && ftime == marker.from && ttime == marker.to) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == dminp && maxp == dmaxp && ftime == marker.from && ttime == dttime) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == marker.minmumnumber && maxp == marker.maxnumber && ftime == dftime && ttime == dttime) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == marker.minmumnumber && maxp == dmaxp && ftime == dftime && ttime == dttime) {
                        marker.setVisible(true);

                    } else if ((ch1 == marker.choice || ch2 == marker.choice || ch3 == marker.choice) && minp == marker.minmumnumber && maxp == marker.maxnumber && ftime == marker.from && ttime == marker.to) {
                        marker.setVisible(true);

                    }

                   


                }

            }
        </script>
                
                    <!-- ABOUT -->
                    <div class="page-section" id="about">
                    <div class="row">
                        <div class="col-md-12" style="font-size: 25px">
                         Create Event:   
                        </div>
                    </div>
                    <div class="row">
                        <form action="create.php" method="post" class="contact-form" id="submitting">
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="text" name="eventName" id="your-name" placeholder="Event Name...">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="number" name="maxPlayers" id="playerMax" placeholder="Maximum Players...">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-12">
                                <input type="number" name="minPlayers" id="playerMin" placeholder="Minimum Players...">
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-6">
                                <input type="text" name="sportName" id="sportname" placeholder="Sport Name...">
                            </fieldset>
                            <fieldset class="col-md-6">
                                Start Date and time<input type="datetime-local" name="startTime" placeholder="Start Date and Time...">
                            </fieldset>
                            <fieldset class="col-md-6">
                                End Date and time<input type="datetime-local" name="endTime" placeholder="Start Date and Time...">
                            </fieldset>
                            <fieldset class="col-md-6 col-sm-6 mypad">
                                <select name="location">
                                    <option value="Jacobs Football Field">Jacobs Football Field</option>
                                    <option value="Jacobs Sports Hall 1">Jacobs Sports Hall 1</option>
                                </select>
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-12">
                                <input type="submit" name="submitEvent" class="button big default" value="Create Event">
                            </fieldset>
                        </form>
                    </div> <!-- .contact-form -->
                    </div>
                    
                    <!-- PROJECTS -->
                    <div class="row">
                        <div id="demo" class="col-md-12" style="font-size: 25px">
                         Available Events:   
                        </div>
                    </div>
                    
                    <div class="page-section" id="projects">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                    
                        

                    <table id="availableTable" class="myTable">
                        <tr class="header">
                            <th style="width:25%;">Event Name</th>
                            <th style="width:25%;">Event ID</th>
                            <th style="width:25%;">Sport Name</th>
                            <th style="width:25%;">Start Date and Time</th>
                        </tr>
                    </table>
                    <form action="join.php" method="post" class="contact-form">
                        <fieldset class="col-md-8 col-sm-6">
                            <input type="text" name="e-id" id="your-name" placeholder="Event ID">
                        </fieldset>
                        <fieldset>
                            <input type='submit' name='submit' value='Join'>
                        </fieldset>
                    </form>
                    </div>

                    <!-- JOINED EVENT -->
                    <div class="row">
                        <div id="demo" class="col-md-12" style="font-size: 25px" >
                         Joined Events:   
                        </div>
                    </div>

                    <div class="page-section" id="joined">

                    <table id="joinedTable" class="myTable">
                        <tr class="header">
                            <th style="width:25%;">Event Name</th>
                            <th style="width:25%;">Event ID</th>
                            <th style="width:25%;">Sport Name</th>
                            <th style="width:25%;">Start Date and Time</th>
                        </tr>
                    </table>
                    <form action="leave.php" method="post" class="contact-form">
                        <fieldset class="col-md-8 col-sm-6">
                            <input type="text" name="e-id" id="your-name" placeholder="Event ID">
                        </fieldset>
                        <fieldset>
                            <input type='submit' name='Leave' value='Leave Event'>
                        </fieldset>
                    </form>
                    </div>


                    <!-- JOINED EVENT -->

                    <div class="row">
                        <div id="demo" class="col-md-12" style="font-size: 25px" >
                         Organized Events:   
                        </div>
                    </div>

                    <div class="page-section" id="organized">

                    <table id="organizedTable" class="myTable">
                        <tr class="header">
                            <th style="width:25%;">Event Name</th>
                            <th style="width:25%;">Event ID</th>
                            <th style="width:25%;">Sport Name</th>
                            <th style="width:25%;">Start Date and Time</th>
                        </tr>
                    </table>
                    <form action="cancel.php" method="post" class="contact-form">
                        <fieldset class="col-md-8 col-sm-6">
                            <input type="text" name="e-id" id="your-name" placeholder="Event ID">
                        </fieldset>
                        <fieldset>
                            <input type='submit' name='cancel' value='Cancel Event'>
                        </fieldset>
                    </form>
                    </div>

                    
                    

                    <!-- CONTACT -->
                    <div class="page-section" id="contact">
                    <div class="row">
                        <div class="col-md-12" style="font-size: 25px">
                         Feedback:   
                        </div>
                    </div>
                    <div class="row">
                    <form action="#" method="post" class="contact-form" name="form">
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="text" id="your-name" placeholder="Your Name..." name="name1">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-6">
                                <input type="email" id="email" placeholder="Your Email..." name="email1">
                            </fieldset>
                            <fieldset class="col-md-4 col-sm-12">
                                <input type="text" id="your-subject" placeholder="Subject..." name="subject">
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-12">
                                <textarea name="message" id="message" cols="30" rows="6" placeholder="Leave your message..." name="message"></textarea>
                            </fieldset>
                            <fieldset class="col-md-12 col-sm-12">
                                <input type="submit" class="button big default" value="Send Message" name="feedback">
                            </fieldset>
                        </form>
                    </div> <!-- .contact-form -->
                    </div>
                    <hr>

                    

                </div>

            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js1/vendor/jquery-1.10.2.min.js"></script>
        <script src="assets/js1/min/plugins.min.js"></script>
        <script src="assets/js1/min/main.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM1WPDhCn4vFenJiW8i00MinJrrZ84rqw&callback=initMap">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

    </body>
    <script>
    function myFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>

    <script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "availableList.php",
            dataType: "html",
            success: function(response){
                $("#availableTable").append(response);
            }
        });
        $.ajax({
            type: "GET",
            url: "joinedList.php",
            dataType: "html",
            success: function(response){
                $("#joinedTable").append(response);
            }
        });
        $.ajax({
            type: "GET",
            url: "organizedList.php",
            dataType: "html",
            success: function(response){
                $("#organizedTable").append(response);
            }
        });
        $.ajax({
            type: "GET",
            url: "info.php",
            dataType: "html",
            success: function(response){
                $(".profile-title").append(response);
            }
        });
    });
    </script>
</html>