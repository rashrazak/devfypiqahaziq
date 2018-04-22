
 <?php 
	$this->load->view('templates/headershopping'); //shoppingtemplate
?>

 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <?php 
            $login = $this->session->userdata('logged_in');
            $emailx =$this->session->userdata('email');

            if ($login){

                echo ' <li class="nav-item">
                <a class="navbar-brand" href="#"><font color="gold"> Subscription, '.$emailx.'</font></a>
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
              <a class="nav-link" href="Seller"  data-toggle="tooltip" data-placement="top" title="Home"><i class="fa fa-home"></i>
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
  </nav>

    <!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">
          <h1 class="my-4">Subscription</h1>
          <div class="list-group">
            <a href="<?php echo site_url('Seller/items') ?>" class="list-group-item"> Items</a>
            <a href="<?php echo site_url('Seller/history') ?>" class="list-group-item"> History</a>

            
          </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <div class="form-control">  
            <p>Month :<?php echo date('F'); ?>, Year: <?php echo date('Y'); ?></p>
            <br>
            <?php if ($unpaid == true){ ?>
                <h3>Your subscription on month <?php echo date('F'); ?>, Year <?php echo date('Y'); ?> is not made </h3>
               <form action="<?php echo site_url('Seller/subscriptionx'); ?>" method="post" enctype="multipart/form-data">
                  <input type="file" name="userfile" class="form-group">
                  <input type="hidden" name="month" value="<?php echo  date('F'); ?>">
                  <input type="hidden" name="year" value="<?php  echo date('Y'); ?>">
                  <br><br>
                  <input type="submit" value="Update" name="submit">
                </form>




            <?php } ?>
          </div>
          
            <div class="form-control">
              <br><br><br>
              <table id="Subscription" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Proof</th>

                  </tr>
                </thead>
                <tbody>
                 
                <?php foreach ($read as $key => $rec) { ?>
                  <tr>
                    <td><?php echo $rec['month']; ?></td>
                    <td><?php echo $rec['year']; ?></td>
                    <td><?php echo $rec['status']; ?></td>
                    <td><img src="<?php echo IMAGEX.'/subscription/'.$rec['photourl']; ?>" height="50px" width="50px"></td>

                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

         
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <div class="row">
        <!-- <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Item Five</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div> -->


    </div>

</div>
<br><br><br><br>
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

