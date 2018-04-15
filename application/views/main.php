<?php 
	$this->load->view('templates/headermain'); //greyscaletemplate
?>
<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ERBAS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">         
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <?php 
            $login = $this->session->userdata('logged_in');
           // $emailx =$this->session->userdata('email');

            if (!$login){

                echo ' <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../register/sellerregister">Register</a>
              </li>';
               
                
            }
            

            ?>
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../seller">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <?php 
           
        

            if (!$login){

                echo ' <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../login">Login</a>
              </li>';
              
               
                
            }
            

            ?>
           
          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h5 class="brand-heading">ERBAS</h5>
              <p class="intro-text">Welcome to E-Rural Business Application System</p>
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About ERBAS</h2>
            <p>The web-based application system and can be used by all the rural people as one of the platform for them to start their own business. 
               ERBAS will help the rural communities by setting up a baseline for them to improve their life thus reducing the gap between rural people and urban people.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Download Section -->
    <section id="register" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>Register ERBAS</h2>
          <p>If you have any craftmanship that you want to sell, you can register with us!</p>
          <p>Dont worry, we will find customer for you ;)</p>
          <a href="#" class="btn btn-default btn-lg">Register</a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="buy" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Buy on ERBAS</h2>
            <p>Sign up with us to receive promotions and newsletter
            or you can directly buy <a href="#">here !</a></p>
            <ul class="list-inline banner-social-buttons">
              <li class="list-inline-item">
                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg">
                  <i class="fa fa-facebook-official fa-fw"></i>
                  <span class="network-name">FB Sign Up</span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                  <i class="fa fa-sign-in fa-fw"></i>
                  <span class="network-name">Usual Sign Up</span>
                </a>
              </li>
             
            </ul>
          </div>
          
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="download-section content-section text-center">
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <h2>Contact ERBAS</h2>
          <p>If you have any enquiries or recommendation that you want to shout, contact us!</p>
          <p>Dont worry, we wont bite ;)</p>
          <a href="#" class="btn btn-default btn-lg">admin@erbas.com.my</a>
          <a href="#" class="btn btn-default btn-lg">+601987615132</a> <br>
          <a href="#" class="btn btn-default btn-lg">Lot 1802, Wisma SCB, Bukit Jalil</a>
        </div>
      </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Copyright &copy; E-Rural Business Application System (ERBAS) 2017</p>
      </div>
    </footer>

    <?php 
	$this->load->view('templates/footermain'); //greyscaletemplate
?>