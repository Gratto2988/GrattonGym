<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon"  type="image/jpg"  href="{{ asset('img/favicon.ico')}} "/><!-- a link to the favicon image placed in the title above  -->
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .sticky {
          position: fixed;
          top: 0;
          width: 100%
        }

        .sticky + .content {
          padding-top: 60px;
        }
    </style>
<script type="text/javascript" src="{{ asset('js/other.js') }}"></script>
</head>
<body onscroll="logScrollDirection()">
  
 
    
<!-- Navbar -->
<nav  class="navbar navbar-default navbar-static-top" id="myNavbar" style="margin-bottom: 0px;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest

                            <li><a href="#first" id="link1">Welcome</a></li>
                            <li><a href="#second" id="link2">Where We Are</a></li>
                            <li><a href="#third" id="link3">Joining Fees</a></li> 
                            <li><a href="#last" id="link4">Facilities</a></li>

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else 
                            <li><a href="#first" id="link1">Welcome</a></li>
                            <li><a href="#second" id="link2">Where We Are</a></li>
                            <li><a href="#third" id="link3">Joining Fees</a></li> 
                            <li><a href="#last" id="link4">Facilities</a></li>
                                  
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{asset('img/w1.png')}}" class="img-responsive" style="width:100%;" alt="weights 1">
    </div>

    <div class="item">
      <img src="{{asset('img/w2.png')}}"  class="img-responsive" style="width:100%;" alt="weights 2">
    </div>

    <div class="item">
      <img src="{{asset('img/wr1.png')}}"  class="img-responsive" style="width:100%;" alt="weights 3">
    </div>

    <div class="item">
      <img src="{{asset('img/wr2.png')}}"  class="img-responsive" style="width:100%;" alt="weights 4">
    </div>

  </div>

  <!-- Left and right controls -->
<!--   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>

<!-- Welcome/ First Container -->
<div id="first" class="container-fluid bg-1 text-center">
  <h3 class="margin">Gratton Gym Welcomes Everyone!</h3>
  <img src="{{asset('img/Dumbbell.png')}}" class="img-responsive img-circle margin" style="display:inline" alt="dumbbell" >
  <p>Gratton Gym welcomes anyone who is interested in joining.</p>
  <p> We offer the chance here at Gratton Gym to get fit and keep motivated, we are here to help you reach your Goals!</p>

</div>

<!-- Where We Are/ Second Container -->
<div id="second" class="container-fluid bg-2 text-center">
  <h3 class="margin">Where We Are</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11409.326071248399!2d-2.1775523777938015!3d53.04704710132358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a42608193e257%3A0x9c26ba1bfa8ddda4!2sWhatmore+St%2C+Stoke-on-Trent+ST6+1SH!5e0!3m2!1sen!2suk!4v1518342861876" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<!-- Joining Third/ Container (Grid) -->
<div id="third" class="container-fluid bg-3 text-center">
<div id="wrapper">  
  <h3 class="margin">Joining Fees</h3><br>
  <div class="row">
    <div id="membership" class="col-sm-4">
        <h4>Part time membership:</h4>
            <p>Monthly cost: £10.00</p>
            <p>Then every entry cost: £2.00</p>
    </div>
    <div id="membership" class="col-sm-4"> 
        <h4>Student Fee:</h4>
            <p>Monthly: £29.95</p>
            One day daily: £4.00</p>     
    </div>
    <div id="membership" class="col-sm-4"> 
        <h4>Adult Fee:</h4>
            <p>Monthly: £34.99</p>
            <p>One day daily: £5.00</p>
    </div>
  </div>
</div>
</div>

<!-- Last Container (Grid) -->
<div id="last" class="container-fluid bg-4 text-center">    
  <h3 class="margin">Facilities</h3><br>
  <div class="row">
    <div class="col-sm-6">
      <h4>Restaurant</h4>
      <img  src="{{asset('img/restaurant.png')}}" class="img-responsive margin jimg" style="width:95%; margin: auto" alt="restaurant">
    </div>
    <div class="col-sm-6"> 
      <h4>Pool</h4>
      <img  src="{{asset('img/pool.png')}}" class="img-responsive margin jimg" style="width:95%; margin: auto" alt="pool">
    </div>
  </div>
</div>
  <div id="last" class="container-fluid bg-4 text-center">   
    <div class="row">
    <div class="col-sm-6"> 
      <h4>Cardio Area</h4>
      <img  src="{{asset('img/cardio.png')}}" class="img-responsive margin jimg" style="width:95%; margin: auto" alt="cardio area">
    </div>
    <div class="col-sm-6"> 
      <h4>Weight Area</h4>
      <img  src="{{asset('img/weightroom.png')}}" class="img-responsive margin jimg" style="width:95%; margin: auto" alt="Weight area">
    </div>
  </div>
</div>

<!-- Footer -->
<footer id="footer" class="container-fluid bg-5 text-center">
<!-- Back to Top Icon -->
    <div class="col-sm12" style="min-height:50px;">
        <a class="up-arrow" href="#myNavbar" data-toggle="tooltip" title="" data-original-title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up" style="font-size: 24px"></span>
        </a>
    </div>
<!-- Social Icons -->
    <div class="col-sm12" style="min-height:50px;">
      <i class="fa fa-facebook-square" id="facebook" style="font-size:32px"></i>
      &nbsp;
      <i class="fa fa-twitter-square" id="twitter" style="font-size:32px"></i>
      &nbsp;
      <i class="fa fa-instagram" id="instagram" style="font-size:32px"></i>
    </div>
<!-- Contact US -->
<div id="contact" class="container-fluid bg-grey" style="width:80%;">
  <h2 class="text-center" style="color: #fff;">CONTACT US</h2>
  <div class="row">
    <div class="col-sm-5" style="color: #fff;">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Stoke-on-Trent</p>
      <p><span class="glyphicon glyphicon-phone"></span> 01782 123456</p>
      <p><span class="glyphicon glyphicon-envelope"></span> info@grattongym.co.uk</p>
    </div>
    <div class="col-sm-7 slideanim" >
    <form method="POST" action="/email">
    {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" type="black;" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</footer>

</div>
</body>
</html>
