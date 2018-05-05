
 <?php 
	$this->load->view('templates/headershopping'); //shoppingtemplate
?>

 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <?php 
        $login = $this->session->userdata('logged_in');
        $emailx = $this->session->userdata('email');

        if ($login){

        echo ' <li class="nav-item">
        <a class="navbar-brand" href="#"><font color="gold"> Welcome Back! '.$emailx.'</font></a>
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
                        <a class="nav-link" href="<?php echo site_url('Seller'); ?>"  data-toggle="tooltip" data-placement="top" title="Home"><i class="fa fa-home"></i>
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="welcome/main" data-toggle="tooltip" data-placement="top" title="About E-RBAS">
                        <i class="fa fa-info-circle"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Question/Report to E-RBAS"><i class="fa fa-question-circle"></i></a>
                        </li>
                    <?php 


                    if ($login == true){

                    echo ' 
                    <li class="nav-item">
                    <a class="nav-link" href="Seller/update" data-toggle="tooltip" data-placement="top" title="Update/Setting"><font color=""><i class="fa fa-cogs"></i></font></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/Logout" data-toggle="tooltip" data-placement="top" title="Sign Out E-RBAS"><font color="red"><i class="fa fa-sign-out"></i></font></a>
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
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4"> Item's</h1>
          <div class="list-group">
            <a href="#" class="list-group-item"> Items</a>
            <a href="add_items" class="list-group-item"> Add Items</a>
          </div>
          <br><br>


        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">
          <?php
          //var_dump($data);exit;
          foreach($data as $key=>$datax){ ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo IMAGEX.$datax['url']; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $datax['name']; ?></a>
                  </h4>
                  <br>
                  <h5>RM <?php echo $datax['price']; ?></h5>
                  <p class="card-text"><?php echo $datax['description']; ?></p>
                 <br>
                  <span class="btn btn-info btn-sm"># <?php echo $datax['categ']; ?></span>
                  <br><br>
                  <button class="btn btn-danger deletex" value="<?php echo $datax['id']; ?>">Delete </button>
                  <?php if ($datax['showpublic'] == 1) { ?>
                    <br> <br>
                    <button class="btn btn-warning hidex" value="<?php echo $datax['id']; ?>">Hide List </button>
                  <?php } else { ?>
                    <br> <br>
                    <button class="btn btn-warning showx" value="<?php echo $datax['id']; ?>">Show List </button>
                  <?php } ?>
                  <a class="btn btn-success" href="<?php echo base_url()?>Seller/updateitem?itemid=<?php echo $datax['id']; ?>">Update </a>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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

