 <?php 
	$this->load->view('templates/headershopping'); //shoppingtemplate
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <?php 
        $login     = $this->session->userdata('logged_in');
        $emailc    = $this->session->userdata('email');
        $namec     = $this->session->userdata('user_id');

        if ($emailc){

            echo ' <li class="nav-item">
            <a class="navbar-brand" href="#"><font color="gold"> Welcome Admin '.$emailc.'</font></a>
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
        <?php if ($namec) { ?>
          <li class="nav-item">
            <a class="nav-link" href="Chat/chatAdmin" data-toggle="tooltip" data-placement="top" title="Chat to E-RBAS"><i class="fa fa-comments"></i></a>
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
<div class="container">
	<div class="row">
		<div class="col-lg-3">
      <h1 class="my-4">Admin Panel</h1>
      <div class="list-group">
        <a href="Admin/view_seller" class="list-group-item"> Search Seller</a>  
        <a href="Admin/view_user" class="list-group-item"> View User</a>  
      </div>
		</div>
		<div class="col-lg-9"><h4>Driver Availability</h4>
         <table id="getCart" class="display table" >
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th> 
              <th>Phone</th>
              <th>Transport</th>
              <th>Plate Number</th>
              <th>Availability</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($riders as $key => $subs) { ?>
          <tr>
            <td><?php echo $subs['id'] ?></td>
            <td><?php echo $subs['name'] ?></td>
            <td><?php echo $subs['hp'] ?></td>
            <td><?php echo $subs['transport'] ?></td>
            <td><?php echo $subs['plate'] ?></td>
            <td><?php if ($subs['status'] == 0){
              echo 'Not Available';
            }else{
              echo 'Available';
            } ?></td>

          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
		

    </div>
	</div>
</div>
<?php 
	$this->load->view('templates/footershopping');
?>