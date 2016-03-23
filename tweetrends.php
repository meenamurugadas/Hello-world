
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Always force latest IE rendering engine -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Meta Keyword -->
        <meta name="keywords" content="one page, business template, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <!-- meta character set -->
        <meta charset="utf-8">

        <!-- Site Title -->
        <title>Tweetrends</title>
        
        <!--
        Google Fonts
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
		
        <!--
        CSS
        ============================================= -->
        <!-- Fontawesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fancybox -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- Animate -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
        <!-- Main Responsive -->
        <link rel="stylesheet" href="css/responsive.css">
		
		
		<!-- Modernizer Script for old Browsers -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		
    </head>
	
    <body>

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a href="#body">
                            <img src="img/images.png" alt="Tweetrends Logo">
                        </a>
                    </h1>
                    <!-- /logo -->

                    </div>

                    <!-- main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                            <li class="current"><a href="#home">Home</a></li>
                            <li><a href="#sign up">Sign Up</a></li>
                            <li><a href="#log in">Log in</a></li>
                            </ul>
                    </nav>
                    <!-- /main nav -->
                </div>

            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


        <!--
        Home Slider
        ==================================== -->
        <section id="home">     
            <div id="home-carousel" class="carousel slide" data-interval="false">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
                    <li data-target="#home-carousel" data-slide-to="2"></li>
                </ol>
                <!--/.carousel-indicators-->

                <div class="carousel-inner">

                    <div class="item active"  style="background-image: url('img/slider/img1.jpg')" >
                        <div class="carousel-caption">
                            <div class="animated bounceInRight">
                                <h2>HELLO WORLD! <br>WELCOME TO TWEETRENDS!!</h2>
                                <p>See What's happening around you!!!</p>
                            </div>
                        </div>
                    </div>              

                    <div class="item" style="background-image: url('img/slider/img2.jpg')">                
                        <div class="carousel-caption">
                            <div class="animated bounceInDown">
                                <h2>HELLO WORLD! <br>WELCOME TO TWEETRENDS!!</h2>
                                <p>See What's happening around you!!!</p>
                            </div>
                        </div>
                    </div>

                    <div class="item" style="background-image: url('img/slider/img3.jpg')">                 
                         <div class="carousel-caption">
                            <div class="animated bounceInUp">
                                <h2>HELLO WORLD! <br>WELCOME TO TWEETRENDS!!</h2>
                                <p>See What's happening around you!!!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.carousel-inner-->
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a class="sl-next" href="#home-carousel" data-slide="next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>

            </div>
        </section>
        <!--
        End #home Slider
        ========================== -->

        
        <!--
        #sign up
        ========================== -->
        <section id="sign up">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown">
                            <h2>Sign Up</h2>    
							 <body>
							 <?php
include('db.php');
$message = null;
if(isset($_POST['action']))
{          
    if($_POST['action']=="signup")
    {
		$name = mysqli_real_escape_string($connection,$_POST['name']);
		$uname= mysqli_real_escape_string($connection,$_POST['uname']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
		elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            mysqli_query($connection,"insert into users(name,username,email,password) values('".$name."','".$uname."','".$email."','".md5($password)."')");
            
        }
    }
}


echo '<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style type="text/css">
input[type=text]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,1.5);
  width:200px;
  min-height: 28px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=text]:focus
{
  width: 600px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
input[type=text]:focus
{
  width: 600px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
input[type=password]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  width:200px;
  min-height: 28px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=password]:focus
{
  width: 400px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(0,0,0,255);
  outline: none;
}
</style>  
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
 </script>
</head>
<body>
<div id="tabs" style="width: 450px;">
  <div id="tabs-2">
    <form action="" method="post">
    <p><input id="name" name="name" type="text" placeholder="Full Name"></p>
	<p><input id="uname" name="uname" type="text" placeholder="User Name"></p>
    <p><input id="email" name="email" type="text" placeholder="Email"></p>
    <p><input id="password" name="password" type="password" placeholder="Password">
    <input name="action" type="hidden" value="signup" /></p>
	<br>
    <p><input id="it",input type="submit" value="Signup" /></p>
	<b>'.$message.'</b>
	</body>
	​</form>
	​</div>
</div>';
   

?>
</body>
​                </div>
                </div>
                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </section>
        <!--
        End #sign up
		
        ========================== -->
		<!--
        #log in
        ========================== -->
        <section id="log in">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown">
                            <h2>Log in</h2>    
							 <body>
							 <?php
$message = null;
if(isset($_POST['action']))
{          
    if($_POST['action']=="login")
    {
		$email = mysqli_real_escape_string($connection,$_POST['email']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
        $query = "SELECT email FROM users where email='".$email."'";
        $strSQL = mysqli_query($connection,"select name from users where email='".$email."' and password='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
        if(count($Results)<=1)
        {
            $message = $Results['name']." Login Success!!";
        }
        else
        {
            $message = "Invalid email or password!!";
        }        
    }
}


echo '<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style type="text/css">
input[type=text]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,1.5);
  width:200px;
  min-height: 28px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=text]:focus
{
  width: 600px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
input[type=password]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  width:200px;
  min-height: 28px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=password]:focus
{
  width: 400px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(0,0,0,255);
  outline: none;
}
</style>  
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
<body>
<div id="tabs" style="width: 450px;">
  <div id="tabs-2">
    <form action="" method="post">
    <p><input id="email" name="email" type="text" placeholder="Email"></p>
    <p><input id="password" name="password" type="password" placeholder="Password">
    <input name="action" type="hidden" value="login" /></p>
	<br>
    <p><input type="submit" value="Login" /></p>
	<br>
	 <b>'.$message.'</b>
 </body>
  </form>
  </div>
</div>';


?>
</body>
							
                </div>
                </div>
                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </section>
        <!--
        End #log in
		
        ========================== -->
        <!--
        #features
        ========================== -->
        
        <section id="features">

            <div class="section-title text-center wow fadeInDown">
                <h2>Features</h2>    
                <p>Look into what you are interested in!!</p>
            </div>
            
            <nav class="project-filter clearfix text-center wow fadeInLeft"  data-wow-delay="0.5s">
                <ul class="list-inline">
                    <li><a href="javascript:;" class="filter" data-filter="all">All</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".app">App</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".photography">Photography</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".web">Web</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".print">Print</a></li>
                </ul>
            </nav>

            <div id="projects" class="clearfix">

                <figure class="mix portfolio-item app">
                    <img class="img-responsive" src="img/portfolio/portfolio-1.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-1.jpg" title="Title One" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item photography">
                    <img class="img-responsive" src="img/portfolio/portfolio-2.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-2.jpg" title="Title Two" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item web">
                    <img class="img-responsive" src="img/portfolio/portfolio-3.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-3.jpg" title="Title Three" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item print">
                    <img class="img-responsive" src="img/portfolio/portfolio-4.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-4.jpg" title="Title Four" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item app">
                    <img class="img-responsive" src="img/portfolio/portfolio-4.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-4.jpg" title="Title Five" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item photography">
                    <img class="img-responsive" src="img/portfolio/portfolio-1.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-1.jpg" title="Title Six" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item web app">
                    <img class="img-responsive" src="img/portfolio/portfolio-2.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-2.jpg" title="Title Seven" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

                <figure class="mix portfolio-item print web">
                    <img class="img-responsive" src="img/portfolio/portfolio-3.jpg" alt="Portfolio Item">
                    <a href="img/portfolio/portfolio-3.jpg" title="Title Eight" rel="portfolio" class="fancybox"><span class="plus"></span></a>
                    <figcaption class="mask">
                        <h3>Awesome Image</h3>
                        <span>Photography</span>
                    </figcaption>
                </figure>

            </div> <!-- end #projects -->

        </section>
        <!--
        End #features
        ========================== -->

             

       <!--
        #footer
        ========================== -->
        <footer id="footer" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="footer-logo wow fadeInDown">
                            <img src="img/images.png" alt="logo">
                        </div>

                        <div class="footer-social wow fadeInUp">
                            <h3>We are social</h3>
                           </div>

                        <div class="copyright">
                           
                           </div>

                    </div>
                </div>
            </div>
        </footer>
        <!--
        End #footer
        ========================== -->


        <!--
        JavaScripts
        ========================== -->
        
        <!-- main jQuery -->
        <script src="js/vendor/jquery-1.11.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jquery.nav -->
        <script src="js/jquery.nav.js"></script>
        <!-- Portfolio Filtering -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Fancybox -->
        <script src="js/jquery.fancybox.pack.js"></script>
        <!-- Parallax sections -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
        <!-- jQuery Appear -->
        <script src="js/jquery.appear.js"></script>
        <!-- countTo -->
        <script src="js/jquery-countTo.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- WOW script -->
        <script src="js/wow.min.js"></script>
        <!-- theme custom scripts -->
        <script src="js/main.js"></script>
    </body>
</html>
