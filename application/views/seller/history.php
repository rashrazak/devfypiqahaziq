
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
            $emailx    = $this->session->userdata('email');


            if ($emailx){

                echo ' <li class="nav-item">
                <a class="navbar-brand" href="#"><font color="gold"> History, '.$emailx.'</font></a>
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
           

            if ($emailx){ ?>


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
            <h1 class="my-4">History <i class="fa  fa-history"></i></h1>
            <br>
            <div class="list-group " id="History">            
                    <div  class="list-group-item mb-4 ">
                        <label for="">History Details <i class="fa  fa-history"></i></label> 
                    </div>
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            <div class="row">
                  <table id="Subscription" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Status</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $rec) { ?>
                    <tr>
                      <td><img src="<?php echo RECEIPTX.$rec['url']; ?>" height="50px" width="50px"></td>
                      <td>Date: <?php echo date('d/m/y g:i A',strtotime($rec['time'])); ?></td>
                      <td>Total Price : RM<?php echo $rec['price']; ?></td>
                      <td><?php echo $rec['paid'] == 0? 'unprocessed':'process'; ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
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

