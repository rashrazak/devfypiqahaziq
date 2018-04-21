 <?php 
  $this->load->view('templates/headershopping'); //shoppingtemplate
?>
 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <?php 


          echo ' <li class="nav-item">
          <a class="navbar-brand" href="/"><font color="gold">E-RBAS Sign Up</font></a>
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
      <h2>Sign Up</h2>
    </div>
    
    <div class="col-lg-9">
      <div class="row">

         <form action="<?php echo site_url('Login/manualUpdatex'); ?>" method="post" enctype="multipart/form-data">
            <img src="<?php echo SIGNUPX.$user['photourl']; ?>"><br><br>
            <input type="text" name="fname" class="form-group" value="<?php echo $user['name']; ?>">
            <br>
            <input type="email" name="email" class="form-group"  value="<?php echo $user['emailx']; ?>">
            <br>
            <input type="password" name="password" class="form-group"  value="<?php echo $user['password']; ?>">
            <br>
            <input type="file" name="userfile" class="form-group">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <br><br>
          <input type="submit" value="Update" name="submit">
          </form>


      </div>
    </div>
  </div>        
</div>