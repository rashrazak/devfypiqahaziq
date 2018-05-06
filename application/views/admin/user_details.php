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
    $('#getCart').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
        $('#getPayment').DataTable( {
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
          <a class="navbar-brand" href="/"><font color="gold">E-RBAS Seller :: '.$data['name'].'</font></a>
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
    <div class="col-lg-5">
      <h2>Seller Detail's</h2>
        <div class="list-group">
          <div  class="list-group-item">
              <p>Name :<?php echo $data['name']; ?></p>
              <p>Email :<?php echo $data['emailx']; ?></p>
              <p>From :<?php echo $data['type']; ?></p>
          </div>
        </div>
        <h4>Cart Detail's</h4>

              <table id="getCart" class="display" style="background-color: #476b6b;">
                    <thead>
                      <tr>

                        <th>Date</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart as $key => $subs) { ?>
                    <tr>

                     <td><?php echo $subs['datebought'] ?></td>
                     <td><?php echo $subs['delivered'] ?></td>
                     <td><?php echo $subs['quantity'] ?></td>
                     <td><?php echo $subs['reason'] ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

    </div>
    
    <div class="col-lg-7">
      <div class="row">
        <h4>Item's</h4>
        <div class="col-lg-12" style="height: 400px; overflow-y: scroll; overflow-x: scroll">
          <div class="row">
            <table id="getPayment" class="display" style="background-color: #476b6b;">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Paid</th>
                        <th>Proof</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $totalx = 0; ?>
                      <?php foreach ($payment as $key => $subsx) { ?>
                      <tr>

                       <td><?php echo $subsx['time'] ?></td>
                       <td>RM <?php echo $subsx['price'] ?></td>
                       <td><?php echo $subsx['hp'] ?></td>
                       <td><?php echo $subsx['address'] ?></td>
                       <td><?php
                       if ($subsx['paid'] == 0) { ?>
                         <blockquote>Unpaid</blockquote>
                         <button id="paidx" class="btn btn-warning"  value="<?php echo $subsx['id']; ?>">Click to paid</button>
                       <?php }else{ ?>
                        <i>Paid</i>
                       <?php } ?>
                       </td>
                       <td><img class="card-img-top" src="<?php echo IMAGEX.$subsx['url']; ?>" alt=""></td>
                      <?php $totalx = $totalx + $subsx['price']; ?>

                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
        <h1><?php echo ' Total Sales: RM'.$totalx ; ?></h1>
      </div>
      <div class="row">
       
          </div>
        </div>
      </div>
    </div>
  </div>        
</div>
   
     <script src="<?php echo base_url();?>assets/js/cart.js"></script>


