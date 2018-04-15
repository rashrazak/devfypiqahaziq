
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
                <a class="navbar-brand" href="#"><font color="gold"> Your Cart, '.$namec.'</font></a>
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
          <h1 class="my-4">Cart <i class="fa  fa-shopping-cart"></i></h1>
          <br>
            <div class="list-group " id="Detail">
            
                    <div  class="list-group-item mb-4 DesDetail">
                    <label for="">Description Details <i class="fa  fa-shopping-cart"></i></label>
                        <p class="pdes"></p>
                    </div>
                
                    <div  class="list-group-item ComDetail">
                    <label for="">Company Details <i class="fa  fa-shopping-cart"></i></label>
                        <p class="pname"></p><br>
                        <p class="pemail"></p><br>
                        <p class="phph"></p><br>
                        <p class="padd"></p><br>
                       
                    </div>
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col">
            <div class="row">
            
                <div class="col-lg-12  mb-4">
                <br>
                    <div class="row  mb-4">
                    <?php foreach ($data as $key => $value) { ?>
                        <div class="col-lg-4  mb-4" style="">
                            <img src="<?php echo IMAGEX.$value->url; ?>" style="width:100%;height:100%;">
                        </div>
                        <div class="col-lg-3  mb-4" style="padding-left:0;">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $value->name; ?></a>
                                    </h4>
                                    <?php 
                                        $price = $value->price;
                                        $quantity = $value->quantity;
                                        $totalPrice = $price * $quantity;
                                     ?>
                                    <h5>RM: <?php echo $totalPrice; ?></h5>
                                    <h5>Quantity: <?php echo $value->quantity; ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="hidden" id="description1" value="<?php echo $value->description; ?>">
                         -->
                        <div class="col-lg-3  mb-4 containerCart" style="padding-left:0;">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <button id="" class="btn btn-primary btn-sm showCompany" value="<?php echo $value->userid; ?>">Company Details</button>
                                        <br>
                                        <button id="" class="btn btn-warning btn-sm showDescription" value="<?php echo $value->description;  ?>">Description</button>
                                        <label class="btn btn-info btn-sm">Category: <?php echo $value->categ; ?></label>
                                        <button id="" class="btn btn-danger btn-sm deleteCart" value="<?php echo $value->cartid; ?>">Delete List</button>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $pricex = $pricex + $totalPrice; 
                        $LIST++;
                        ?>
                    <?php } ?>
                    </div>
               

                </div>
            </div>
            <div class="row mb-4 ">
                <div class="col-3" style="padding-left:0;">        
                    <div class="list-group-item " >
                    <input type="hidden" name="totalPrice" value="<?php echo $pricex; ?>">
                    <input type="hidden" name="totalList" value="<?php echo $LIST; ?>">
                    <h3>Total: RM <?php echo $pricex; ?> </h3>
                    <h3>No of Items: <?php echo $LIST; ?></h3>
                    
                    </div>
                </div>
                <div class="col-3" style="padding-left:0;">        
                    <div class="list-group-item " >
                    <?php if (!empty($value)) { ?>
                        <button id="" class="btn btn-primary btn-sm proceedx" value="<?php echo $value->userid; ?>">Proceed Payment</button>
                    <?php }else{ ?>
                        <h1>Your Cart is Empty!</h1>
                        <a class="btn btn-info"href="<?php echo site_url('Welcome');?>"> Back</a>
                    <?php  } ?>
                    </div>
                </div>
            </div>

            <div class="row " id="UploadReceipt">
                
                    <div class="col-9" style="padding-left:0;">        
                        <div class="list-group-item " >
                        <h5>Submit Proof Payment:</h5>
                            <?php 
                            echo form_open_multipart('Items/submitPayment'); //form location ke controller,,
                            ?>
                            <input type="file" name="userfile"class="form-control" size="20" /> 
                            <input type="text" name="hp" placeholder="phone number" class="form-control" >
                            <input type="textarea" name="address" placeholder="Insert Address" class="form-control">
                            <input type="hidden" name="totalprice" value="<?php echo $pricex; ?>">
                            <input type="hidden" name="items" value="<?php echo $LIST; ?>">
                            <input type="hidden" name="email" value="<?php echo $emailx; ?>">
                            <?php 
                            $data3 = array('class' => 'btn btn-danger pull-right' ,'name'=>'submit','value' => 'Update Item');
                            ?>
                            <?php echo form_submit($data3); ?>

                        </div>
                    </div>
                    <!-- <div class="col-3" style="padding-left:0;">        
                        <div class="list-group-item " >
                        <button id="" class="btn btn-primary btn-sm proceed" value="<?php echo $value->userid; ?>">Proceed Payment</button>
                        </div>
                    </div> -->
                
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

