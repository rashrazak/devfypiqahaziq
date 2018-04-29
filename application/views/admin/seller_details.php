 <?php 
  $this->load->view('templates/headershopping'); //shoppingtemplate
  // var_dump($data);exit;
?>
 <!-- Navigation -->
     <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript " src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript " src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> 
    <script type="text/javascript " src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!--  <script src="<?php echo base_url();?>assets/js/datatableList.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function() {
    $('#getSubscription').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
        $('#getActivity').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
    </script>
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
    <div class="col-lg-4">
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
        <h4>Subscription Detail's</h4>

              <table id="getSubscription" class="display" style="background-color: #476b6b;">
                    <thead>
                      <tr>

                        <th>Month</th>
                        <th>Year</th>
                        <th>Status</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($read as $key => $subs) { ?>
                    <tr>

                      <td><?php echo $subs['month'] ?></td>
                     <td><?php echo $subs['year'] ?></td>
                     <td><?php echo $subs['status'] ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

    </div>
    
    <div class="col-lg-8">
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
                  <h2>Item ID : 00<?php echo $datax['id']; ?></h2>
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
        <h4>Recent's Activity</h4>
        <div class="col-lg-12" style="height: 400px; overflow-y: scroll;"">
          <div class="row">
            <table id="getActivity" class="display" style="width:100%">
                    <thead>
                      <tr>

                        <th>Item ID</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Reason</th>

                      </tr>
                    </thead>
                    <tbody>
                  
                   <?php foreach($jobs as $key=>$datay){ ?>
                      <?php foreach ($datay as  $value) { ?>
                       <tr>
                        <td>00<?php echo $value['itemid'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo $value['delivered'] ?></td>
                        <td><?php echo $value['reason'] ?></td>
                      </tr>
                      <?php } ?>
                    
                  <?php } ?>
                  </tbody>
                </table>
         
          </div>
        </div>


      </div>
    </div>
  </div>        
</div>
   



