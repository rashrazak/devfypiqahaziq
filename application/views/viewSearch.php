
 <?php 
    $this->load->view('templates/headershopping'); //shoppingtemplate
    // var_dump($data);
    $pricex = 0;
    $LIST = 0;
?>

 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <?php 
            $login     = $this->session->userdata('logged_in');
            $emailx    = $this->session->userdata('emailC');
            $namec     = $this->session->userdata('nameC');
            $photo     = $this->session->userdata('photourlC');

            if ($emailx){

                echo ' <li class="nav-item">
                <a class="navbar-brand" href="#"><font color="gold"> Search, '.$namec.'</font></a>
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
              <a class="nav-link" href="../Welcome"  data-toggle="tooltip" data-placement="top" title="Home"><i class="fa fa-home"></i>
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
           

            if ($emailx  == true){ ?>


              <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Seller/update'); ?>" data-toggle="tooltip" data-placement="top" title="Update/Setting"><font color=""><i class="fa fa-cogs"></i></font></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Logout" data-toggle="tooltip" data-placement="top" title="Sign Out E-RBAS"><font color="red"><i class="fa fa-sign-out"></i></font></a>
          </li>
        
               
                
           <?php }else { ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Login'); ?>"><font color="yellow"><i class="fa fa-sign-in"></i></font></a>
            </li>

            <?php } ?>
            
          </ul>
        </div>
      </div>
</nav>
   <!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">
                <?php
                    if($this->session->flashdata('success')):
                        $success = $this->session->flashdata('success');
                        echo ' <div id="mydiv"><font size="3" color="red">'.$success.'</font></div>';
                    endif;
                ?>
          <h1 class="my-4">Search <i class="fa  fa-search"></i></h1>
          <br>
            <div class="list-group " id="Search">
            
                    <div  class="list-group-item mb-4 ">
                        <label for="">Search Details <i class="fa  fa-search"></i></label>
                        <form action="search" method="get">
                        <input type="text" name="search" placeholder="<?php echo $searchx; ?>"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                        
                    </div>
 
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col">
            <div class="row">
            
                <div class="col-lg-12">
                <br>
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

        <!-- /.col-lg-9 -->
    </div>


</div>
    <!-- /.container -->

    <!-- Footer -->
    <br><br>
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; E-RBAS 2017</p>
  </div>
  
</footer>

  <?php 
      $this->load->view('templates/footershopping');
  ?>

