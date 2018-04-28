 <?php 
  $this->load->view('templates/headershopping'); //shoppingtemplate
  // var_dump($data);exit;
?>
 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <?php 


          echo ' <li class="nav-item">
          <a class="navbar-brand" href="/"><font color="gold">E-RBAS Seller :: '.$data['fname'].'</font></a>
        </li>';


    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    </div>
  </div>
</nav>

    <!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h2>Seller Detail's</h2>
        <div class="list-group">
          <div  class="list-group-item">
              <p>Name :<?php echo $data['fname']; ?></p>
              <p>ICPP :<?php echo $data['icpp']; ?></p>
              <p>Phone :<?php echo $data['hp']; ?></p>
              <p>Address: <br><?php echo $data['address']; ?></p>
              <p>City :<?php echo $data['city']; ?></p>
              <p>Maybank Account :<?php echo $data['maybankaccount']; ?></p>
              <p>Total Items :<?php echo count($items); ?></p>
          </div>
        </div>
    </div>
    
    <div class="col-lg-9">
      <div class="row">
        <h4>Item's</h4>
        <div class="col-lg-12" style="height: 400px; overflow-y: scroll;"">
          <div class="row">
          <?php
          foreach($items as $key=>$datax){ ?>

            <div class="col-lg-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo IMAGEX.$datax['url']; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $datax['name']; ?></a>
                  </h4>
                  <h5>RM <?php echo $datax['price']; ?></h5>
                  <p class="card-text"><?php echo $datax['description']; ?></p>
                  <span class="btn btn-info btn-sm"># <?php echo $datax['categ']; ?></span>      
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>


      </div>
    </div>
  </div>        
</div>