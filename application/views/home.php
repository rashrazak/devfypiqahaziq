
 <?php 
	$this->load->view('templates/headershopping'); //shoppingtemplate
?>
 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <?php 
        $login     = $this->session->userdata('logged_in');
        $emailc    = $this->session->userdata('emailC');
        $namec     = $this->session->userdata('nameC');
        $photo     = $this->session->userdata('photourlC');
    
        if ($emailc){

            echo ' <li class="nav-item">
            <a class="navbar-brand" href="#"><font color="gold"> Welcome '.$emailc.'</font></a>
          </li>';
          
            
        }else {

          echo ' <li class="nav-item">
          <a class="navbar-brand" href="#"><font color="gold">E-RBAS</font></a>
        </li>';

        }

        ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"  data-toggle="tooltip" data-placement="top" title="Home"><i class="fa fa-home"></i>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="welcome/main" data-toggle="tooltip" data-placement="top" title="About E-RBAS">
              <i class="fa fa-info-circle"></i>
            </a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="Items/search" data-toggle="tooltip" data-placement="top" title="Shopping E-RBAS">
              <i class="fa fa-search"></i>
            </a>
          </li>
        <?php if ($photo) { ?>
          <li class="nav-item">
            <a class="nav-link" href="Chat/chatSeller" data-toggle="tooltip" data-placement="top" title="Chat to E-RBAS"><i class="fa fa-comments"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Items/cart" data-toggle="tooltip" data-placement="top" title="Cart "><i class="fa  fa-shopping-cart"></i></a>
          </li>
          <?php } ?>
        <?php 
          if ($emailc){

              echo ' 
                <li class="nav-item">
                <a class="nav-link" href="Logout" data-toggle="tooltip" data-placement="top" title="Sign Out E-RBAS"><font color="red"><i class="fa fa-sign-out"></i></font></a>
              </li>
            '; 
          }else {

                echo ' <li class="nav-item">
                <a class="nav-link" href="Login"><font color="yellow"><i class="fa fa-sign-in"></i></font></a>
              </li>';

          }
        ?>
        </ul>
      </div>
    </div>
  </div>
</nav>

    <!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h2>E-RBAS</h2>
      <?php if ($emailc == null) { ?>
          <div id="gmail-login">
            <button type="button" class="btn btn-primary" id="poppin1">Login to buy</button>
            <div id="poppin2">
              <br>
              <button onclick="registerGoogle()" class="btn-info">Gmail <i class="fa fa-envelope"></i> </button>
              <br>
              <left>OR</left>
              <br>
              <form action="<?php echo site_url('Login/manualLogin'); ?>" class="form-control" method="post">
                <input type="email" name="email" placeholder="insert email" class="form-group">
                <input type="password" name="password" placeholder="password" class="form-group">
                <button type="submit" name="submit">Submit</button>
              </form>
              <br>
              <left>OR</left>
              <a href="<?php echo site_url('Login/manualSignUp'); ?>"><u>Sign Up</u> </a>

            </div>
          </div>
          <br>
        <?php } else { ?>
          <!-- show stats -->
          <div>
            <h4 class="my-4 "></h4>
            <div class="list-group">
              <img src="<?php echo $photo; ?>" alt="" style="width:100%;">
              <h1><?php echo $namec; ?></h1>
            </div>
          </div>

      <?php } ?>
      <?php if ($photo) { ?>
      <h4 class="my-4 ">Navigate here:</h4>
      <div class="list-group">
        <a href="Items/search" class="list-group-item">Search Item <i class="fa  fa-search"></i></a>
        <a href="Items/cart" class="list-group-item">Cart <i class="fa fa-shopping-cart"></i></a>
        <a href="Items/history" class="list-group-item">History <i class="fa fa-history"></i></a>
      </div>
      <?php } ?>

    </div>
    
    <div class="col-lg-9">
      <div class="w3-content w3-section">
        <a href=""><img class="mySlides w3-animate-fading" src="http://placehold.it/900x350" style="width:100%"></a>
        <a href=""><img class="mySlides w3-animate-fading" src="http://placehold.it/900x350" style="width:100%"></a>
        <a href=""><img class="mySlides w3-animate-fading" src="http://placehold.it/900x350" style="width:100%"></a>
        <a href=""><img class="mySlides w3-animate-fading" src="http://placehold.it/900x350" style="width:100%"></a>
      </div>
      <div class=" col-sm-offset-3">
        <div class="list-group">  
          <div class="list-group-item">
          <h4>Most bought item..</h4> 
          </div>
          <br>
        </div>
      </div>
      <div class="row">
        <?php foreach ($data as $key => $item) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo IMAGEX.$item['url']; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                  <a href="#"><?php echo $item['name']; ?></a>
                  </h4>
                  <h5>RM<?php echo $item['price']; ?></h5>
                  <a class="btn btn-success btn-sm" href="<?php echo base_url()?>Items/view?itemid=<?php echo $item['id']; ?>">View </a>
                </div>                
                <span class="btn btn-default btn-sm"># <?php echo $item['categ']; ?></span>
                <div class="card-footer">
                  <small class="text-muted"> <?php echo $item['bought']; ?> bought this week!</small>
                </div>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>        
</div>
       
           
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; E-RBAS 2017</p>
      </div>
      <!-- /.container -->
    </footer>

   

<?php 
	$this->load->view('templates/footershopping');
?>

